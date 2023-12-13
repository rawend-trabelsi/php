<?php
include_once('../models/FoodModel.php');
include_once('../database/config.php');

class FoodController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Food $f)
    {
        $query = "INSERT INTO `food` (`id`, `food_name`, `food_categorie`, `food_descraption`, `food_price`, `food_ingredient`, `food_availibility`, `food_image`) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);
        $array = array(
            $f->getId(),
            $f->getFoodName(),
            $f->getFoodCategorie(),
            $f->getFoodDescraption(),
            $f->getFoodPrice(),
            $f->getFoodIngredient(),
            $f->getFoodAvailibility(),
            $f->getFoodImage()
        );
        return $res->execute($array);
    }

    function getFoodById($id)
    {
        $query = "SELECT * FROM food WHERE id = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($id));
        $array = $res->fetch(PDO::FETCH_ASSOC);
        return $array; 
    }

    function liste()
    {
        $query = "SELECT * FROM food";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }

    function update_Food(Food $f)
    {
        $sql = "UPDATE food SET  food_name=?, food_categorie=?, food_descraption=?, food_price=?, food_ingredient=?, food_availibility=?, food_image=? WHERE id=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(
            $f->getFoodName(),
            $f->getFoodCategorie(),
            $f->getFoodDescraption(),
            $f->getFoodPrice(),
            $f->getFoodIngredient(),
            $f->getFoodAvailibility(),
            $f->getFoodImage(),
            $f->getId()
        ));
    }

    function delete($id)
    {
        $query = "DELETE FROM food WHERE id=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($id));
    }
   

function getListeFoods()
{
    $query = "SELECT * FROM food";
    $res = $this->pdo->prepare($query);
    $res->execute();
    return $res->fetchAll(PDO::FETCH_ASSOC);
}

}
?>
