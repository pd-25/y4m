<?php

namespace App\Http\Controllers\admin\product;

use App\Core\category\CategoryInterface;
use App\Core\products\ProductInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public $productInterface, $categoryInterface;
    public function __construct(ProductInterface $productInterface, CategoryInterface $categoryInterface)
    {
        $this->productInterface = $productInterface;
        $this->categoryInterface = $categoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index', [
            "products" => $this->productInterface->fetchAllProducts("DESC")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => $this->categoryInterface->fetchAllCategories("DESC")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'name' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'type' => 'required|string',
                'description' => 'required|string',
                'variant_name.*' => 'required|string',
                'measurement.*' => 'required|string',
                'measurement_param.*' => 'required|string',
                'price.*' => 'required|numeric',
                'quantity.*' => 'required|integer',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'hederscript' => 'nullable|string',
            ]);

            // Update the input with default values where necessary
            $request->merge([
                'measurement_param' => '0',
            ]);

            $variations = [];
            foreach ($request->variant_name as $index => $variantName) {
                $variations[] = [
                    'variant_name' => $variantName,
                    'measurement' => $request->measurement[$index],
                    //'measurement_param' => $request->measurement_param[$index],
                    'measurement_param' => 0,
                    'price' => $request->price[$index],
                    'quantity' => $request->quantity[$index],
                    'is_show' => $index === 0 ? 1 : 0,
                ];
            }


            $productData = $request->only("name", "category_id", "type", "description", "meta_title", "meta_description", "hederscript");

            $productData["quantity_in_stock"] = array_sum(array_column($variations, 'quantity'));

            $productImages = $request->only("images");

            $storeProduct = $this->productInterface->storeProduct($productData, $variations, $productImages);
            //dd($storeProduct);
            if ($storeProduct) {
                return redirect()->route('product-mamages.index')->with('msg', 'Product created successfully!');
            } else {
                return back()->with('msg', 'Some error occur!');
            }
        } catch (\Throwable $th) {
            Log::debug('ErrorFile-', [$th->getFile()]);
            Log::debug('ErrorMsg-', [$th->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $product = $this->productInterface->fetchProductBySlug($slug);
        if (!$product) {
            return redirect()->route('product-mamages.index')->with('error', 'Product not found');
        }

        return view('admin.products.edit', [
            'product' => $product,
            'categories' => $this->categoryInterface->fetchAllCategories("DESC"),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'category_id' => 'required|exists:categories,id',
                'type' => 'required|string',
                'description' => 'required|string',
                'variant_name.*' => 'required|string',
                'measurement.*' => 'required|string',
                'measurement_param.*' => 'required|string',
                'price.*' => 'required|numeric',
                'quantity.*' => 'required|integer',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
                'meta_title' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'hederscript' => 'nullable|string',
            ]);
            // dd($request->all());
            // Prepare variations
            $request->merge([
                'measurement_param' => '0',
            ]);
            $variations = [];
            foreach ($request->variant_name as $index => $variantName) {
                $variations[] = [
                    'variant_name' => $variantName,
                    'measurement' => $request->measurement[$index],
                    'measurement_param' => 0,
                    'price' => $request->price[$index],
                    'quantity' => $request->quantity[$index],
                ];
            }

            // Prepare main product data
            $productData = $request->only("name", "category_id", "type", "description", "meta_title", "meta_description", "hederscript");
            $productData["quantity_in_stock"] = array_sum(array_column($variations, 'quantity'));

            // Prepare images if any new images are uploaded
            $productImages = $request->only("images");

            // Call the update method in the interface
            $updateProduct = $this->productInterface->updateProduct($id, $productData, $variations, $productImages);

            if ($updateProduct) {
                return redirect()->route('product-mamages.index')->with('msg', 'Product updated successfully!');
            } else {
                return back()->with('msg', 'An error occurred while updating the product');
            }
        } catch (\Throwable $th) {
            Log::debug('ErrorFile-', [$th->getFile()]);
            Log::debug('ErrorMsg-', [$th->getMessage()]);
            return back()->with('error', 'An error occurred. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $deleted = $this->productInterface->deleteProductById($id);

        if ($deleted) {
            return redirect()->route('product-mamages.index')->with('msg', 'Product deleted successfully.');
        } else {
            return redirect()->route('product-mamages.index')->with('msg', 'Failed to delete the product.');
        }
    }
}
