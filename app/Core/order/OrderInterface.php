<?php
namespace App\Core\order;
interface OrderInterface {
    public function getAllCarts($userId);
    public function storeOrder($OrderData);
    public function fetchAllorders();
    public function showOrderDetails($id);
    public function updateOrder($id, $data);
    public function deleteOrder($id);

    
}