<?php

require_once('../models/Order.php');
require_once('../database/config.php');

class CommandeController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }
    function listerCommandes()
    {
        $query = "SELECT * FROM orders";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    
        $commandes = array();
       
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $order = new Order(
                $row['order_id'],
                $row['user_id'],
                $row['food_name'],
                $row['food_price'],
                $row['quantity'],
                $row['full_name'],
                $row['contact'],
                $row['address'],
                $row['order_date']
            );
    
            
            
    
            $commandes[] = $order;
           
        }
    
        return $commandes;
        
    }
    
    function delete($order_id) {
        echo "Trying to delete order with ID: $order_id<br>";
    
        $query = "DELETE FROM orders WHERE order_id = ?";
        $res = $this->pdo->prepare($query);
    
        if (!$res) {
            die("Erreur de préparation de la requête: " . $this->pdo->errorInfo()[2]);
        }
    
        if (!$res->execute(array($order_id))) {
            die("Erreur d'exécution de la requête: " . $res->errorInfo()[2]);
        }
    
        echo "Order deleted successfully";
        return true;
    }
    
    
}
?>
