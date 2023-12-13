

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@5.15.1/css/all.min.css">
    <link rel="stylesheet" href="design.css">
</head>
<body>

<div class="container">
    <form method="post" action="data.php?page=login"> 
        <div class="mb-3">
            <label for="loginEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
        </div>
        <div class="mb-3">
            <label for="loginPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
        </div>
        
        <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
       
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
session_start();

if (isset($_SESSION['login_error'])) {
    echo "<div style='color: red; text-align: center;'><p>" . $_SESSION['login_error'] . "</p></div>";

    unset($_SESSION['login_error']); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    require_once '../controllers/AuthController.php';
    $authController = new AuthController();
    $authController->login($email, $password);
}
?>