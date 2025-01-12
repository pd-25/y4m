<?php

namespace App\Core\review;

use App\Models\ProductReview;



class ProductReviewRepo implements ProductReviewInterface
{
    public function getAllReviews()
    {
        return ProductReview::all();
    }

    public function getReviewsByProductId($productId)
    {
        return ProductReview::where('product_id', $productId)->get();
    }

    public function getReviewsByUserId($userId)
    {
        return ProductReview::where('user_id', $userId)->get();
    }

    public function createReview(array $data)
    {
        return ProductReview::create($data);
    }

    public function updateReview($id, array $data)
    {
        $review = ProductReview::findOrFail($id);
        $review->update($data);

        return $review;
    }

    public function deleteReview($id)
    {
        $review = ProductReview::findOrFail($id);
        return $review->delete();
    }
}
