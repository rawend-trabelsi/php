<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>

    <!-- Include Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }
        .sidebar {
            float: left;
        }


        /* Ajoutez des styles personnalisés supplémentaires pour votre formulaire */
        .container {
            max-width: 500px; /* Ajustez la largeur maximale du conteneur du formulaire */
        }

        
        .btn-primary {
            width: 100%; /* Rendre le bouton en pleine largeur */
        }
    </style>
</head>
<body>

<?php $this->load->view('sidbar'); ?>


<div >
    <div class="container mt-5">
        <h2>Add New Admin</h2>

        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($success_message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('admins/add_admin'); ?>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Add Admin</button>

        <?php echo form_close(); ?>

    </div>
</div>

<!-- Include Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
