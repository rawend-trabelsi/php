<?php
require_once('../controllers/CategorieController.php');
include_once('../database/config.php');
include_once('../models/CategoryModel.php');

$categorieCtr = new CategorieController(); 

$categorieCtr->delete($_GET['id']);


header('Location: affiche_categorie.php');
?>
