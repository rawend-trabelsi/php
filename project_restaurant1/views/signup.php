<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@5.15.1/css/all.min.css">
    <link rel="stylesheet" href="design.css">
</head>
<body>

<div class="container">
    <!-- Sign Up Form -->
    <form method="post" action="data.php?page=signup">

        <div class="mb-3">
            <label for="signupName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="signupName" name="signupName" required>
        </div>
        <div class="mb-3">
            <label for="signupEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupEmail" name="signupEmail" required>
        </div>
        <div class="mb-3">
            <label for="signupPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="signupPassword" name="signupPassword" required>
        </div>
        <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i> Sign Up</button>
    </form>
    
<a href="login.php">J'ai déjà un compte. Se connecter ici.</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['signup_success'])) {
    echo '<div class="alert alert-success" role="alert">' . $_SESSION['signup_success'] . '</div>';
    unset($_SESSION['signup_success']); // Efface la variable de session après l'affichage
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['signup_error'])) {
    echo '<div class="alert alert-danger" role="alert">' . $_SESSION['signup_error'] . '</div>';
    unset($_SESSION['signup_error']); 
}
?>
>
