<?php

namespace App\Core\review;

interface ProductReviewInterface
{
    public function getAllReviews();
    public function getReviewsByProductId($productId);
    public function getReviewsByUserId($userId);
    public function createReview(array $data);
    public function updateReview($id, array $data);
    public function deleteReview($id);
}
