<?php

namespace App\Core\products;

interface ProductInterface
{
    public function fetchAllProducts($orderBy);
    public function fetchsingleProduct($slug);
    public function fetchProductBySlug($slug);
    public function addReview($slug);

    public function storeProduct($productData, $variations, $productImages);
    public function updateProduct($productId, $productData, $variations, $productImages);
    public function deleteProductById(int $id): bool;
}
