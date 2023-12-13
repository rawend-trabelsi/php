
<?php
include_once('../controllers/SearchController.php');

$searchController = new SearchController();
$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

if (!empty($searchTerm)) {
    $results = $searchController->searchFood($searchTerm);
} else {
    $results = array(); 
}
?>

<!-- ... Your HTML code to display search results ... -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
/* Ajoutez ces styles à votre fichier CSS existant ou créez-en un nouveau */

.food-menu {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.food-menu-box {
    margin: 15px;
    max-width: 300px;
}

    </style>
</head>
<body>

    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="index3.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.html">Categories</a>
                    </li>
                    <li>
                        <a href="foods.html">Foods</a>
                    </li>
                    <li>
                        <a href="login.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <h2>Foods on Your Search <a href="food-search.php" class="text-white"><?php echo $searchTerm; ?></a></h2>
        </div>
    </section>

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php if (!empty($results)) : ?>
                <?php foreach ($results as $result) : ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <img src="<?php echo $result['food_image']; ?>" alt="<?php echo $result['food_name']; ?>" class="img-responsive img-curve">
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $result['food_name']; ?></h4>
                            <p class="food-price">$<?php echo $result['food_price']; ?></p>
                            <p class="food-detail"><?php echo $result['food_descraption']; ?></p>
                            <br>
                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center text-white">No results found.</p>
            <?php endif; ?>
        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

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
            <p>All rights reserved. Designed By <a href="#">Rawend Trabelsi </a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>
