<?php

require_once('OrderModel.php');
class OrderModel {
    private $pdo;
    

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function saveOrder($data) {
        $query = "INSERT INTO orders (user_id, food_name, food_price, quantity, full_name, contact, address, order_date) VALUES (:user_id, :food_name, :food_price, :quantity, :full_name, :contact, :address, NOW())";
    
        $stmt = $this->pdo->prepare($query);
    
        $stmt->execute([
            'user_id' => $data['user_id'],
            'food_name' => $data['food_name'],
            'food_price' => $data['food_price'],
            'quantity' => $data['quantity'],
            'full_name' => $data['full_name'],
            'contact' => $data['contact'],
            'address' => $data['address']
        ]);
    }
    public function getAllOrders() {
        $query = "SELECT * FROM orders";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>
