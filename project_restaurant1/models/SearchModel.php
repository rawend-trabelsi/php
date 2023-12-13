<?php
require_once('../database/config.php');

class SearchModel extends Connexion {
    
    public function getFoodBySearchTerm($searchTerm) {
        $query = "SELECT * FROM food WHERE food_name LIKE '%$searchTerm%'";
        $result = $this->pdo->query($query);
    
        if ($result && $result->rowCount() > 0) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return array(); 
        }
    }
}
?>
