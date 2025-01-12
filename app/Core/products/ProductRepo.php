<?php

namespace App\Core\products;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

class ProductRepo implements ProductInterface
{
    public $productModel;
    public function __construct()
    {
        $this->productModel = Product::query();
    }
    public function fetchAllProducts($orderBy)
    {
        if ($orderBy == "Rand") {
            return $this->productModel->inRandomOrder()->limit(12)->get();
        }
        if ($orderBy == "limit") {
            return $this->productModel->inRandomOrder()->limit(12)->get();
        }
        return $this->productModel->orderBy("id", $orderBy)->get();
    }

    public function fetchProductBySlug($slug)
    {
        try {
            $product = $this->productModel
                ->where('slug', $slug)
                ->with(['productImages', 'productVariants'])  // Using correct relationship names
                ->first();

            return $product; // Returns null if the product isn’t found, no exception needed
        } catch (\Throwable $th) {
            $this->getLogs($th);
            return null;
        }
    }


    public function storeProduct($productData, $variations, $productImages)
    {
        try {
            return DB::transaction(function () use ($productData, $variations, $productImages) {


                $createProduct = $this->productModel->create($productData);

                if ($createProduct instanceof Product) {
                    foreach ($variations as &$variation) {
                        $variation['product_id'] = $createProduct->id;
                    }
                    DB::table("product_variants")->insert($variations);
                    foreach ($productImages['images'] as $index => $pImage) {
                        $db_image = time() . rand(0000, 9999) . '.' . $pImage->getClientOriginalExtension();
                        $pImage->storeAs("ProductImages", $db_image, 'public');

                        ProductImage::create([
                            "product_id" => $createProduct->id,
                            "image_path" => "ProductImages/" . $db_image,
                            "is_primary" => $index === 0 ? 1 : 0  // Set first image as primary
                        ]);
                    }
                    return true;
                }
                return false;
            });
        } catch (\Throwable $th) {
            $this->getLogs($th);
            return false;
        }
    }
    public function updateProduct($productId, $productData, $variations, $productImages)
    {
        try {
            return DB::transaction(function () use ($productId, $productData, $variations, $productImages) {

                // Update the main product data
                $product = $this->productModel->find($productId);
                if (!$product) {
                    throw new \Exception("Product not found");
                }
                $product->update($productData);

                // Update variations
                DB::table('product_variants')->where('product_id', $productId)->delete();
                foreach ($variations as &$variation) {
                    $variation['product_id'] = $productId;
                }
                DB::table('product_variants')->insert($variations);

                // Update product images
                if (!empty($productImages['images'])) {
                    // Remove old images
                    ProductImage::where('product_id', $productId)->delete();

                    // Add new images
                    foreach ($productImages['images'] as $index => $pImage) {
                        $db_image = time() . rand(0000, 9999) . '.' . $pImage->getClientOriginalExtension();
                        $pImage->storeAs("ProductImages", $db_image, 'public');

                        ProductImage::create([
                            "product_id" => $productId,
                            "image_path" => "ProductImages/" . $db_image,
                            "is_primary" => $index === 0 ? 1 : 0  // Set first image as primary
                        ]);
                    }
                }

                return true;
            });
        } catch (\Throwable $th) {
            $this->getLogs($th);
            return false;
        }
    }

    public function deleteProductById(int $id): bool
    {
        try {
            DB::transaction(function () use ($id) {
                $product = Product::findOrFail($id);
                $product->productImages()->delete();  // Delete related images
                DB::table('product_variants')->where('product_id', $id)->delete();  // Delete related variants
                $product->delete();  // Now delete the product
            });
            return true;
        } catch (Exception $e) {
            Log::error("Failed to delete product with ID {$id}: " . $e->getMessage());
            return false;
        }
    }


    public function getLogs($th)
    {
        Log::debug('ErrorFile-', [$th->getFile()]);
        Log::debug('ErrorMsg-', [$th->getMessage()]);
    }

    public function fetchsingleProduct($slug)
    {
        return $this->productModel->with("productImages", "productVariantPrice", "productReviews")->where("slug", $slug)->first();
    }

    public function addReview($data)
    {
        try {
            $data['user_id'] = auth()->id();
            $storeReview = ProductReview::create($data);
            if ($storeReview instanceof ProductReview) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
}
