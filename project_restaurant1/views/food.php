<?php
include('navbar.php');
session_start(); // Start the session
$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../controllers/FoodController.php');
    require_once('../models/FoodModel.php');

    $food_name = $_POST['food_name'];
    $food_categorie = $_POST['food_categorie'];
    $food_descraption = $_POST['food_descraption'];
    $food_price = $_POST['food_price'];
    $food_ingredient = $_POST['food_ingredient'];
    $food_availibility = $_POST['food_availibility'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["food_image"]["name"]);

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    move_uploaded_file($_FILES["food_image"]["tmp_name"], $targetFile);

    $foodCtr = new FoodController();
    $food = new Food();
    $food->setFoodName($food_name);
    $food->setFoodCategorie($food_categorie);
    $food->setFoodDescraption($food_descraption);
    $food->setFoodPrice($food_price);
    $food->setFoodIngredient($food_ingredient);
    $food->setFoodAvailibility($food_availibility);
    $food->setFoodImage($targetFile);

    $res = $foodCtr->insert($food);

    if ($res) {
        $_SESSION['success_message'] = 'Food item added successfully.';
        header('Location: food1.php');
        exit(); 
    } else {
        $_SESSION['error_message'] = 'Error adding food item. Please try again.';
        header('Location: food1.php');
        exit(); 
    }
}
?>
