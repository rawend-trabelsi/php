<?php
include('navbar.php');
$success_message = "";
$error_message = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('../controllers/CategorieController.php');
    require_once('../models/CategoryModel.php');

    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["category_image"]["name"]);

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    move_uploaded_file($_FILES["category_image"]["tmp_name"], $targetFile);

    $categoryCtr = new CategorieController();
    $category = new Categorie();
    $category->setCategorieName($category_name);
    $category->setCategorieDescription($category_description);
    $category->setCategorieImage($targetFile);

    $res = $categoryCtr->insert($category);

    if ($res) {
        $success_message = 'Category added successfully.';
        var_dump($success_message); 
       
    } else {
        $error_message = 'Error adding category. Please try again.';
        var_dump($error_message); 
    }
    header('Location: category1.php'); 
    
}
?>