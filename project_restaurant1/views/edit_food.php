<?php
include('navbar.php');
require_once('../controllers/FoodController.php');
include_once('../database/config.php');
include_once('../models/FoodModel.php');

$foodController = new FoodController();

$res = $foodController->getFoodById($_GET['id']);

if ($res) {
    $food = $res;
} else {
    echo "Food not found";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Food Item</title>
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <br>
        <h2 class="mt-4 mb-4">Edit Food Item</h2>
        <form action="modification_food.php" method="post" enctype="multipart/form-data">
    <!-- Form fields go here -->

            <input type="hidden" name="id" value="<?php echo isset($food['id']) ? $food['id'] : ''; ?>">
            <div class="form-group">
                <label for="food_name">Food Name</label>
                <input type="text" class="form-control" id="food_name" name="food_name" value="<?php echo isset($food['food_name']) ? $food['food_name'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="food_categorie">Food Category</label>
                <input type="text" class="form-control" id="food_categorie" name="food_categorie" value="<?php echo isset($food['food_categorie']) ? $food['food_categorie'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="food_description">Food Description</label>
                <textarea class="form-control" id="food_description" name="food_description"><?php echo isset($food['food_description']) ? $food['food_description'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="food_price">Food Price</label>
                <input type="text" class="form-control" id="food_price" name="food_price" value="<?php echo isset($food['food_price']) ? $food['food_price'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="food_ingredient">Food Ingredient</label>
                <input type="text" class="form-control" id="food_ingredient" name="food_ingredient" value="<?php echo isset($food['food_ingredient']) ? $food['food_ingredient'] : ''; ?>" required>
            </div>
            <div class="form-group">
    <label for="food_availability">Food Availability</label>
    <select class="form-control" id="food_availability" name="food_availability" required>
        <option value="oui" <?php echo ($food['food_availability'] == 'oui') ? 'selected' : ''; ?>>Oui</option>
        <option value="non" <?php echo ($food['food_availability'] == 'non') ? 'selected' : ''; ?>>Non</option>
    </select>
</div>

            <div class="form-group">
                <label for="food_image">Food Image :</label>
                <?php if (isset($food['food_image'])) : ?>
                    <img src="<?php echo $food['food_image']; ?>" alt="<?php echo isset($food['food_name']) ? $food['food_name'] : ''; ?>" style="max-width: 100px;">
                <?php endif; ?>
                <input type="file" class="form-control-file" id="food_image" name="food_image">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
