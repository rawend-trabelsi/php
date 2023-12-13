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
     
    } else {
        $error_message = 'Error adding category. Please try again.';
        
    }
}
?>

<html lang="en">

<head>
    <!-- ... Autres balises head ... -->
    <title>Ajouter une catégorie de restaurant</title>
    <br>
    <link rel="stylesheet" href="categorie.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <?php
        if ($success_message) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> ' . $success_message . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        } elseif ($error_message) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> ' . $error_message . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        }
        ?>

        <h2 class="text-primary mb-4">Ajouter une catégorie de restaurant</h2>
        <form action="category1.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="category_name" class="text-primary">Nom de la catégorie :</label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Entrez le nom de la catégorie" title="Obligatoire" required>
            </div>
            <div class="form-group">
                <label for="category_description" class="text-primary">Description :</label>
                <textarea class="form-control" id="category_description" name="category_description"></textarea>
            </div>
            <div class="form-group">
                <label for="category_image" class="text-primary">Image :</label>
                <input type="file" class="form-control-file" id="category_image" name="category_image">
            </div>
            <button type="submit" class="btn btn-primary bg-primary">Ajouter la catégorie</button>
        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php include('footer.php'); ?>
</body>
   


</html>
