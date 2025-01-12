<?php

namespace App\Core\category;

use App\Models\Category;

class CategoryRepo implements CategoryInterface
{
    public $categoryModel;
    public function __construct()
    {
        $this->categoryModel = Category::query();
    }
    public function fetchAllCategories($orderBy)
    {
        return $this->categoryModel->orderBy("id", $orderBy)->get();
    }
    public function storeCat(array $data)
    {
        try {
            $this->categoryModel->create($data);
            return true;
        } catch (\Throwable $th) {
            return  false;
        }
    }

    public function getSingleCate($slug)
    {
        return $this->categoryModel->where("slug", $slug)->first();
    }

    public function updateCat(array $data, $slug)
    {
        try {
            return $this->categoryModel->where("slug", $slug)->update($data);
        } catch (\Throwable $th) {
            return  false;
        }
    }

    public function deleteCat($slug)
    {
        try {
            $check = $this->categoryModel->with("products")->where("slug", $slug)->first();
            if ($check) {
                $check->products->each(fn($product) => $product->delete());
                return $check->delete();
            }
            return false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function fetchCatWithProducts()
    {
        $categories = $this->categoryModel->with(['products' => function ($query) {
            $query->take(12); // Limit total products across all categories
        }])->get();

        // Modify product allocation logic if you want to split the 12 products evenly across categories.
        $allocatedProducts = [];
        $totalProductsFetched = 0;
        $productLimit = 12;

        foreach ($categories as $category) {
            if ($totalProductsFetched >= $productLimit) break;

            // Set max products per category dynamically as per available limit
            $remainingProducts = $productLimit - $totalProductsFetched;
            $categoryProducts = $category->products->take(min(3, $remainingProducts)); // Adjust as per allocation needs
            $allocatedProducts[$category->id] = $categoryProducts;

            // Update count of fetched products
            $totalProductsFetched += $categoryProducts->count();
        }

        dd($allocatedProducts);
    }
}
