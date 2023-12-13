
<?php
include('navbar.php');
session_start(); 
?>

<html lang="en">

<head>
<link rel="stylesheet" href="food.css">
</head>

<body>
    <div class="container mt-4">
    
        <br>
        <br>
        <h2 class="text-primary mb-4">Ajouter un aliment</h2>

        <?php
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success:</strong> ' . $_SESSION['success_message'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            unset($_SESSION['success_message']);
        } elseif (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error:</strong> ' . $_SESSION['error_message'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
            unset($_SESSION['error_message']);
        }
        ?>


        <form action="food.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
                <label for="food_name" class="text-primary">Nom de l'aliment :</label>
                <input type="text" class="form-control" id="food_name" name="food_name" placeholder="Entrez le nom de l'aliment" title="Obligatoire" required>
            </div>
            <div class="form-group">
                <label for="food_categorie" class="text-primary">Catégorie :</label>
                <input type="text" class="form-control" id="food_categorie" name="food_categorie" placeholder="Entrez la catégorie de l'aliment" title="Obligatoire" required>
            </div>
            <div class="form-group">
                <label for="food_descraption" class="text-primary">Description :</label>
                <textarea class="form-control" id="food_descraption" name="food_descraption"></textarea>
            </div>
            <div class="form-group">
                <label for="food_price" class="text-primary">Prix :</label>
                <input type="text" class="form-control" id="food_price" name="food_price" placeholder="Entrez le prix de l'aliment" title="Obligatoire" required>
            </div>
            <div class="form-group">
                <label for="food_ingredient" class="text-primary">Ingrédients :</label>
                <input type="text" class="form-control" id="food_ingredient" name="food_ingredient" placeholder="Entrez les ingrédients de l'aliment" title="Obligatoire" required>
            </div>
            <div class="form-group">
                <label for="food_availibility" class="text-primary">Disponibilité :</label>
                <input type="text" class="form-control" id="food_availibility" name="food_availibility" placeholder="Entrez la disponibilité de l'aliment" title="Obligatoire" required>
            </div>
            <div class="form-group">
                <label for="food_image" class="text-primary">Image :</label>
                <input type="file" class="form-control-file" id="food_image" name="food_image">
            </div>
            <button type="submit" class="btn btn-primary bg-primary">Ajouter l'aliment</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
      
        $(document).ready(function() {
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });
    </script>


</body>

</html>
