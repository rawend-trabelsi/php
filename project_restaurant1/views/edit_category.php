<?php
include('navbar.php');
require_once('../controllers/CategorieController.php');

$categoriectr = new CategorieController();

$res = $categoriectr->getId($_GET['id']);

if ($res) {
    $category = $res; 
} else {
    echo "Catégorie non trouvée";
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Éditer la catégorie</title>
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
        <h2 class="mt-4 mb-4">Éditer la catégorie</h2>
        <form action="modification.php" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo isset($category['id']) ? $category['id'] : ''; ?>">
            <div class="form-group">
                <label for="category_name">Nom de la catégorie</label>
                <input type="text" class="form-control" id="category_name" name="categorie_name" value="<?php echo isset($category['categorie_name']) ? $category['categorie_name'] : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="category_description">Description</label>
                <textarea class="form-control" id="category_description" name="categorie_description"><?php echo isset($category['categorie_description']) ? $category['categorie_description'] : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="category_image">Image :</label>
                <?php if (isset($category['categorie_image'])) : ?>
                    <img src="<?php echo $category['categorie_image']; ?>" alt="<?php echo isset($category['category_name']) ? $category['category_name'] : ''; ?>" style="max-width: 100px;">
                <?php endif; ?>
                <input type="file" class="form-control-file" id="category_image" name="categorie_image">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
