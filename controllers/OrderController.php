<?php

require_once '../models/OrderModel.php';

class OrderController {
    private $orderModel;

    public function __construct($orderModel) {
        $this->orderModel = $orderModel;
    }

    public function confirmOrder($data) {
        $this->orderModel->saveOrder($data);
    }
     public function getAllOrders() {
            return $this->orderModel->getAllOrders();
        }
   
}
?>
