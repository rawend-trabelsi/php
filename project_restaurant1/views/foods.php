
    <?php
include_once('../controllers/FoodController.php');
include_once('../models/FoodModel.php');

$foodController = new FoodController();
$foods = $foodController->getListeFoods();
?>

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
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php foreach ($foods as $food) : ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <img src="<?php echo $food['food_image']; ?>" alt="<?php echo $food['food_name']; ?>" class="img-responsive img-curve">
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $food['food_name']; ?></h4>
                        <p class="food-price">dt<?php echo $food['food_price']; ?></p>
                        <p class="food-detail"><?php echo $food['food_descraption']; ?></p>
                        <br>

                       <!-- ... Votre code existant ... -->
<a href="order.php?food_name=<?php echo $food['food_name']; ?>&food_image=<?php echo $food['food_image']; ?>&food_price=<?php echo $food['food_price']; ?>" class="btn btn-primary">Order Now</a>
<!-- ... Votre code existant ... -->

                    </div>
                </div>
            <?php endforeach; ?>

            <div class="clearfix"></div>
        </div>
    </section>



    <!-- social Section Ends Here -->


</body>
</html>