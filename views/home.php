<?php
session_start();
require_once '../database/config.php';
require_once '../models/Order.php'; 
require_once '../controllers/CommandeController.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $commandeController = new CommandeController();
    $commandes = $commandeController->listerCommandes();

   
} else {
    header('Location: index.php');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index1.css">
    <title>Accueil</title>
 <style>body {
    background-color: #f8f9fa;
    padding: 20px;
}

.container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
}

.welcome-message {
    text-align: center;
    margin-bottom: 20px;
}

h1 {
    color: #007bff;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

/* Style pour la colonne de suppression */
.delete-btn {
    text-decoration: none;
    color: #fff;
    background-color: #dc3545;
    border: 1px solid #dc3545;
    padding: 5px 10px;
    border-radius: 3px;
}

.delete-btn:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

/* Footer style */
footer {
    margin-top: 20px;
    padding: 10px;
    background-color: #f2f2f2;
    text-align: center;
    border-radius: 5px;
}</style>



</head>
<body>

    <?php include("navbar.php"); ?>

    <div class="welcome-message">
        <h1>Bienvenue, administrateur!</h1>
    </div>
<table border="1">
    <thead>
        <tr>
            <th>Commande ID</th>
            <th>Food Name</th>
            <th>Food Price</th>
            <th>Quantity</th>
            <th>Full Name</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Order Date</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($commandes as $commande) : ?>
        <tr>
            <td><?php echo $commande->getOrderId(); ?></td>
            <td><?php echo $commande->getFoodName(); ?></td>
            <td><?php echo $commande->getFoodPrice(); ?></td>
            <td><?php echo $commande->getQuantity(); ?></td>
            <td><?php echo $commande->getFullName(); ?></td>
            <td><?php echo $commande->getContact(); ?></td>
            <td><?php echo $commande->getOrderDate() ? $commande->getOrderDate() : 'Nabeul'; ?></td>
            <td><?php echo $commande->getAddress(); ?></td>
        </tr>
    <?php endforeach; ?>
</tbody>

</table>






    </div>

    <?php include("footer.php"); ?>

</body>
</html>
