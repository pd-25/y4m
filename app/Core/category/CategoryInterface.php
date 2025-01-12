<?php
namespace App\Core\category;

interface CategoryInterface {
    public function fetchAllCategories($orderBy);
    public function storeCat(array $data);
    public function updateCat(array $data, $slug);
    public function deleteCat($slug);
    public function getSingleCate($slug);
    public function fetchCatWithProducts();
    
    
    
    
    
}