<?php
session_start();

$adminUsername = "admin";
$adminPassword = "admin123";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

  
    if ($username == $adminUsername && $password == $adminPassword) {
       
        $_SESSION['loggedin'] = true;
        
        header('Location: home.php');
        exit;
    } else {
       
        $_SESSION['loggedin'] = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
    /* Ajout du style pour l'image */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #87CEEB; /* Couleur de fond plus claire */
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .login-container {
        display: flex;
        align-items: center;
        justify-content: space-around;
        background-color: #fff;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        border-radius: 8px;
        width: 300px;
        text-align: center;
        transition: box-shadow 0.3s ease-in-out;
    }

    .login-container:hover {
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    }

    .login-container h2 {
        color: #2d3e50;
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 10px;
        display: block;
        color: #34495e;
    }

    .form-group input {
        width: 100%;
        padding: 12px;
        box-sizing: border-box;
        border: 1px solid #95a5a6;
        border-radius: 6px;
        transition: border-color 0.3s ease-in-out;
        margin-bottom: 10px;
    }

    .form-group input:focus {
        border-color: #2980b9;
    }

    .login-btn {
        background-color: #2980b9;
        color: #fff;
        padding: 14px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .login-btn:hover {
        background-color: #1f6690;
    }
 .login-container img {
        width: 80px; 
        border-radius: 50%;
        margin-left: auto; 
    }
</style>

    <title>Connexion</title>
</head>
<body>

    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <?php
      
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === false) {
            echo '<p style="color: red;">Nom d\'utilisateur ou mot de passe incorrect!</p>';
           
            unset($_SESSION['loggedin']);
        }
        ?>
        <div class="form-group">
            <label for="username">Nom d'utilisateur </label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe </label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="login-btn">Se connecter</button>
    </form>
     <img src="uploads/admin.jpeg" alt="Image de connexion">

</body>
</html>