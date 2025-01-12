<?php

namespace App\Http\Controllers\admin\product;

use App\Core\review\ProductReviewInterface;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    protected $reviewRepository;

    public function __construct(ProductReviewInterface $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function index()
    {
        return response()->json($this->reviewRepository->getAllReviews());
    }

    public function showByProduct($productId)
    {
        // Fetch the product along with its reviews and each review's associated user
        $product = $this->reviewRepository->getReviewsByProductId($productId);
        $productname = Product::find($productId);

        // Return a view with the product and reviews
        return view('admin.review.index', compact('product','productname'));
    }
    

    public function showByUser($userId)
    {
        return response()->json($this->reviewRepository->getReviewsByUserId($userId));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'star' => 'required|integer|min:1|max:5',
            'note' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $review = $this->reviewRepository->createReview($data);

        return response()->json($review, 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'star' => 'integer|min:1|max:5',
            'note' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $review = $this->reviewRepository->updateReview($id, $data);

        return response()->json($review);
    }

    public function destroy($id)
    {
        $this->reviewRepository->deleteReview($id);
        
        return redirect()->route('reviews.index')->with('msg', 'Review deleted successfully');
    }
    public function updateStatus($reviewId)
    {
        // Find the review by its ID
        $review = ProductReview::findOrFail($reviewId);

        // Toggle the status between 'pending' and 'approved'
        $review->status = ($review->status == 'pending') ? 'approved' : 'pending';
        
        // Save the updated status
        $review->save();

        // Redirect back to the previous page with a success message
        return redirect()->back()->with('msg', 'Review status updated successfully.');
    }
}
