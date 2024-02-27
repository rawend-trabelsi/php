<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Page commande</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include your additional CSS files if any -->

    <style>
        body {
            background-color: #fffaf0;
            padding-bottom: 60px; /* Adjust this value based on the height of your footer */
        }

        .container {
            margin-bottom: 60px; /* Adjust this value based on the height of your footer */
        }

        nav {
            background-color: #ffe4e1;
        }

        footer {
            background-color: #ffe4e1;
            width: 100%;
            /* Remove position: fixed; */
        }

        /* Add some padding to the container */
        .container {
            padding-top: 20px; /* Adjust this value based on your design preferences */
        }

        /* Rest of your styles */
    </style>
</head>
<body>
    <?php $this->load->view ('utilisateur/navigation.php'); ?> 

    <div class="container">
        <h2 class="mb-4">Passer votre commande ici !!!</h2>

        <?php echo validation_errors(); ?>

        <?php if (isset($success_message)): ?>
            <div class="alert alert-success">
                <?= $success_message ?>
            </div>
        <?php endif; ?>

  
        <form method="post" action="<?= site_url('commande/index'); ?>">
            <div class="form-group">
                <label for="nom_client">Nom Client</label>
                <input type="text" class="form-control" name="nom_client" value="<?= set_value('nom_client'); ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom_client">Prenom Client</label>
                <input type="text" class="form-control" name="prenom_client" value="<?= set_value('prenom_client'); ?>" required>
            </div>

            <div class="form-group">
                <label for="adresse_client">Adresse Client</label>
                <textarea class="form-control" name="adresse_client" required><?= set_value('adresse_client'); ?></textarea>
            </div>

            <!-- Your existing checkout cart items and total display -->

            <button type="submit" name="submit_order" class="btn btn-primary">acheter</button>
        </form>
    </div>

    <?php $this->load->view('utilisateur/footer.php'); ?>

  
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include your additional JS files if any -->
</body>
</html>
