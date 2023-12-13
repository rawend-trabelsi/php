<?php
require_once('../controllers/FoodController.php');
include_once('../database/config.php');
include_once('../models/FoodModel.php');

$foodCtr = new FoodController();

$foodCtr->delete($_GET['id']);

header('Location: affiche_food.php');
?>
