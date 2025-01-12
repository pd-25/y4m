<?php

namespace App\Core\order;

use App\enum\OrderStatus;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderRepo implements OrderInterface
{
    public function getAllCarts($userId = null)
    {
        if ($userId) {
            return Cart::with("product", "user", "productVariant")->where('user_id', $userId)->get();
        }
        return Cart::with("product", "user")->get();
    }

    public function storeOrder($orderData)
    {
        try {
            DB::beginTransaction();

            $getCarts = $this->getAllCarts(auth()->id());
            $totalPrice = 0;
            $orderItems = [];

            if ($getCarts->count() > 0) {
                foreach ($getCarts as $cartItem) {
                    $totalPrice += $cartItem->quantity * $cartItem->productVariant->price;
                    $orderItems[] = [
                        "product_id" => $cartItem->product?->id,
                        "product_variant_id" => $cartItem->productVariant?->id,
                        "quantity" => $cartItem->quantity,
                        "price" => $cartItem->quantity * $cartItem->productVariant->price
                    ];
                }

                $orderData["total_price"] = $totalPrice;
                $orderData["user_id"] = auth()->id();
                $orderData["order_number"] = $this->generateUniqueOrderNumber();
                $orderData["status"] = OrderStatus::PENDING;

                // Create the order
                $storeOrder = Order::create($orderData);

                // Check if order was created successfully
                if (!$storeOrder) {
                    return [
                        "status" => false,
                        "msg" => "Failed to create order."
                    ];
                }

                // Create order items
                $createdOrderItems = $storeOrder->orderItems()->createMany($orderItems);
                Cart::where("user_id", auth()->id())->delete();
                // Check if order items were created successfully
                if (!$createdOrderItems || count($createdOrderItems) !== count($orderItems)) {
                    return [
                        "status" => false,
                        "msg" => "Failed to create all order items."
                    ];
                }

                DB::commit();

                return [
                    "status" => true,
                    "msg" => "Order and order items created successfully."
                ];
            } else {
                return [
                    "status" => false,
                    "msg" => "No items in cart to create an order."
                ];
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return [
                "status" => false,
                "msg" => $th->getMessage()
            ];
        }
    }

    private function generateUniqueOrderNumber(): int
    {
        $prefix = rand(100, 999);
        $random_number = rand(100000, 999999);
        $order_number = $prefix . sprintf("%06d", $random_number);
        $existing_booking = Order::where('order_number', $order_number)->exists();
        if ($existing_booking) {
            return $this->generateUniqueOrderNumber();
        }
        return intval($order_number);
    }

    //admin
    public function fetchAllOrders()
    {
        return Order::with('orderItems')->get(); // Include order items if needed
    }

    // Show order details by ID
    public function showOrderDetails($id)
    {
        return Order::with('orderItems')->findOrFail($id);
    }

    // Update an order
    public function updateOrder($id, $data)
    {
        $order = Order::findOrFail($id);
        $order->update($data);
        return $order;
    }

    // Delete an order
    public function deleteOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->orderItems()->delete(); // Delete related order items
        return $order->delete(); // Then delete the order
    }
    
}
