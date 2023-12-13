<?php
include('navbar.php');
require_once('../controllers/CategorieController.php');
include_once('../models/CategoryModel.php');
$categoriectr = new CategorieController();

$categorie = new Categorie();
$res = $categoriectr->getId($_POST['id']);


$categorie->setId($_POST['id']);
$categorie->setCategorieName($_POST['categorie_name']);
$categorie->setCategorieDescription($_POST['categorie_description']);


if (!empty($_FILES["categorie_image"]["name"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["categorie_image"]["name"]);

    if (move_uploaded_file($_FILES["categorie_image"]["tmp_name"], $targetFile)) {
        
        $categorie->setCategorieImage($targetFile);
    } else {
       
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    // Retain the existing image path if no new image is uploaded
    $categorie->setCategorieImage($res['categorie_image']);
}


$categoriectr->modifier_user($categorie);


header('Location: affiche_categorie.php');
?>
