<?php

require_once '../controllers/AuthController.php';
require_once '../models/UserModel.php';

$authController = new AuthController();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'login'; 
}

if ($page === 'signup') {
    require_once 'index3.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $authController->signup($_POST['signupName'], $_POST['signupEmail'], $_POST['signupPassword']);
    }
} elseif ($page === 'login') {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $authController->login($_POST['loginEmail'], $_POST['loginPassword']);
    }

   
if (isset($_GET['error']) && $_GET['error'] == 1) {
    echo "<p style='color: red;'>Mot de passe incorrect. Veuillez réessayer.</p>";
    // Ajoutez un message de débogage pour afficher les valeurs pertinentes
    echo "Email: " . $_POST['loginEmail'] . "<br>";
    echo "Password: " . $_POST['loginPassword'] . "<br>";
    
}
}

?>
