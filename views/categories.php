<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
  <?php
  include("Navuser.html");
  ?>
    <!-- Navbar Section Ends Here -->



    <!-- CAtegories Section Starts Here -->
    <?php
    include_once('../controllers/CategorieController.php');
    include_once('../models/CategoryModel.php');
    
    $foodCategoryController = new CategorieController();
    $categories = $foodCategoryController->liste();
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Restaurant Website</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    
        <!-- ... Votre section navbar et food-search restent inchangées ... -->
    
        <!-- Categories Section Starts Here -->
        <section class="categories">
            <div class="container">
                <h2 class="text-center">Explore Foods</h2>
    
                <?php foreach ($categories as $category) : ?>
                    <a href="#">
                        <div class="box-3 float-container">
                            <img src="<?php echo $category['categorie_image']; ?>" alt="<?php echo $category['categorie_name']; ?>" class="img-responsive img-curve">
                            <h3 class="float-text text-white"><?php echo $category['categorie_name']; ?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
    
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- Categories Section Ends Here -->
    
        <!-- ... Votre section food-menu, social, footer restent inchangées ... -->
    
    </body>
    </html>
    <!-- Categories Section Ends Here -->


    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Vijay Thapa</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>