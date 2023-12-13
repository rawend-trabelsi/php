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
<?php include("Navuser.html")
?>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
        <form action="food-search.php" method="GET">
    <input type="search" name="search" placeholder="Search for Food.." required>
    <input type="submit" value="Search" class="btn btn-primary">
</form>


        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php
include_once('../controllers/CategorieController.php');
include_once('../models/FoodModel.php');

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

    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
   <!-- fOOD MEnu Section Starts Here -->
<!-- fOOD MEnu Section Starts Here -->
<?php include("foods.php");
?>

    <!-- social Section Ends Here -->

    <!-- footer Section Starts Here -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Rawend Trabelsi</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>