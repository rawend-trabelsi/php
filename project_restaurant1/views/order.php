<?php
require_once '../models/OrderModel.php';
require_once '../database/config.php';
require_once '../controllers/OrderController.php';

$pdo = new PDO('mysql:host=localhost;dbname=restaurant', 'root', '');
$orderModel = new OrderModel($pdo);
$orderController = new OrderController($orderModel);

$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $orderData = [
        'user_id' => 1,
        'food_name' => $_POST['food_name'] ?? '',
        'food_price' => $_POST['food_price'] ?? '',
        'quantity' => $_POST['qty'] ?? 1,
        'full_name' => $_POST['full-name'] ?? '',
        'contact' => $_POST['contact'] ?? '',
        'email' => $_POST['email'] ?? '',
        'address' => $_POST['address'] ?? ''
    ];

    try {
        $orderController->confirmOrder($orderData);
        $successMessage = 'Commande bien reçue';
    } catch (Exception $e) {
        // Gérez les erreurs si nécessaire
    }
}
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
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form method="post" action="order.php<?php echo isset($_GET['food_image']) ? '?food_image=' . $_GET['food_image'] : ''; ?><?php echo isset($_GET['food_name']) ? '&food_name=' . $_GET['food_name'] : ''; ?><?php echo isset($_GET['food_price']) ? '&food_price=' . $_GET['food_price'] : ''; ?>" class="order">


    <fieldset>
        <legend>Selected Food</legend>

        <div class="food-menu-img">
            <img src="<?php echo isset($_GET['food_image']) ? $_GET['food_image'] : ''; ?>" alt="Selected Food" class="img-responsive img-curve">
        </div>

        <div class="food-menu-desc">
            <h4><?php echo isset($_GET['food_name']) ? $_GET['food_name'] : ''; ?></h4>
            <p class="food-price"><?php echo isset($_GET['food_price']) ? 'dt' . $_GET['food_price'] : ''; ?></p>

            <!-- Ajout de champs cachés pour food_name et food_price -->
            <input type="hidden" name="food_name" value="<?php echo isset($_GET['food_name']) ? $_GET['food_name'] : ''; ?>">
            <input type="hidden" name="food_price" value="<?php echo isset($_GET['food_price']) ? $_GET['food_price'] : ''; ?>">

            <div class="order-label">Quantity</div>
            <input type="number" name="qty" class="input-responsive" value="1" required>
        </div>
    </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="flen fouleni " class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="*********" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g.rawendtrabelsi@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Nabeul,sidi achour" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
               
                </fieldset>

            </form>

<!-- Ajoutez cette partie pour afficher le message -->
<?php if (!empty($successMessage)) : ?>
    <div id="success-message" class="text-center text-white">
        <?php echo $successMessage; ?>
    </div>
<?php endif; ?>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- social Section Starts Here -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="rawend trabelsi"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href=""><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
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
            <p>All rights reserved. Designed By <a href="#">Rawend Trabelsi</a></p>
        </div>
    </section>
    <!-- footer Section Ends Here -->

</body>
</html>