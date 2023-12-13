<?php
include('navbar.php');
require_once('../controllers/FoodController.php');
include_once('../models/FoodModel.php');

$foodController = new FoodController();

$food = new Food();
$res = $foodController->getFoodById($_POST['id']);

// Use $res to retrieve existing data
$food->setId($_POST['id']);
$food->setFoodName($_POST['food_name']);
$food->setFoodCategorie($_POST['food_categorie']);
$food->setFoodDescraption($_POST['food_description']);
$food->setFoodPrice($_POST['food_price']);
$food->setFoodIngredient($_POST['food_ingredient']);
$food->setFoodAvailibility($_POST['food_availability']);

// tet52ked itha limage mawjouda
if (!empty($_FILES["food_image"]["name"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["food_image"]["name"]);

    if (move_uploaded_file($_FILES["food_image"]["tmp_name"], $targetFile)) {
        // Update image only if upload is successful
        $food->setFoodImage($targetFile);
    } else {
        // itha upload fail 
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    // path jdidd
    $food->setFoodImage($res['food_image']);
}

$foodController->update_Food($food);
header('Location: affiche_food.php');
?>
