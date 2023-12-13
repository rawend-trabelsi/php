<?php
include('navbar.php');
include_once('../models/FoodModel.php');
include_once('../database/config.php');
include_once('../controllers/FoodController.php'); 
$controller = new FoodController(); 
$foods = $controller->liste(); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="affiche_food.css"> <!-- You can create this CSS file for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Afficher les aliments</title>

</head>

<body>
    <div class="container">
        <br>

        <h2 class="mt-4 mb-4">Liste des aliments</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Catégorie</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Ingrédients</th>
                    <th>Disponibilité</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($foods as $food) : ?>
                    <tr>
                        <td><?php echo $food['id']; ?></td>
                        <td><?php echo $food['food_name']; ?></td>
                        <td><?php echo $food['food_categorie']; ?></td>
                        <td><?php echo $food['food_descraption']; ?></td>
                        <td><?php echo $food['food_price']; ?></td>
                        <td><?php echo $food['food_ingredient']; ?></td>
                        <td><?php echo $food['food_availibility']; ?></td>
                        <td><img src="<?php echo $food['food_image']; ?>" alt="<?php echo $food['food_name']; ?>" style="max-width: 100px;"></td>
                        <td>
                            <a href="edit_food.php?id=<?php echo $food['id']; ?>" class="btn btn-warning btn-sm edit-btn">
                                <i class="bi bi-pencil-square edit-icon"></i>
                            </a>
                            <a href="delete_food.php?id=<?php echo $food['id']; ?>" class="btn btn-danger btn-sm delete-btn">
                                <i class="bi bi-trash delete-icon"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
