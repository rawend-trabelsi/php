
<?php
include('navbar.php');
include_once('../models/CategoryModel.php');
include_once('../database/config.php');
include_once('../controllers/CategorieController.php'); 
$controller = new CategorieController();
$categories = $controller->liste();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="affichecategorie.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <title>Afficher les catégories</title>

</head>

<body>
    <div class="container">
        <br>

        <h2 class="mt-4 mb-4">Liste des catégories</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['categorie_name']; ?></td>
                        <td><?php echo $category['categorie_description']; ?></td>
                        <td><img src="<?php echo $category['categorie_image']; ?>" alt="<?php echo $category['categorie_name']; ?>" style="max-width: 100px;"></td>
                        <td>
                            <a href="edit_category.php?id=<?php echo $category['id']; ?>" class="btn btn-warning btn-sm edit-btn">
                                <i class="bi bi-pencil-square edit-icon"></i>
                            </a>
                            <a href="delete_categorie.php?id=<?php echo $category['id']; ?>" class="btn btn-danger btn-sm delete-btn">
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
