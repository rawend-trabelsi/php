<?php
require_once '../models/OrderModel.php';
require_once '../database/config.php';
require_once '../controllers/OrderController.php';

$pdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');
$orderModel = new OrderModel($pdo);
$orderController = new OrderController($orderModel);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $orderData = [
        'user_id' => 1,
        'food_name' => $_POST['food_name'] ?? '',
        'food_price' => $_POST['food_price'] ?? '',
        'quantity' => $_POST['qty'] ?? 1,
        'full_name' => $_POST['full-name'] ?? '',
        'contact' => $_POST['contact'] ?? '',
        'email' => $_POST['email'] ?? '',
        'address' => $_POST['address'] ?? ''
    ];

    try {
        $orderController->confirmOrder($orderData);
        echo 'Commande bien reçue';
        exit();
    } catch (Exception $e) {
        echo 'Erreur lors de la confirmation de la commande : ' . $e->getMessage();
        exit();
    }
} else {
    echo 'Erreur : le formulaire n\'a pas été soumis correctement.';
    exit();
}
?>
