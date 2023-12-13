<?php
include_once('../models/CategoryModel.php');
include_once('../database/config.php');

class CategorieController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(Categorie $c)
    {
        $query = "INSERT INTO `food_categories` (`id`, `categorie_name`, `categorie_description`, `categorie_image`) VALUES(?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);
        $array = array($c->getId(), $c->getCategorieName(), $c->getCategorieDescription(), $c->getCategorieImage());
        return $res->execute($array);
    }

    function getId($id)
    {
        $query = "SELECT * FROM food_categories WHERE id= ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($id));
        $array = $res->fetch(PDO::FETCH_ASSOC);
        return $array; 
    }
    
   

    function liste(){
        $query = "select * from food_categories";
        $res=$this->pdo->prepare($query);
        $res->execute();
        return $res;
        }
        function modifier_user(Categorie $c)
{
$sql = "UPDATE food_categories SET  categorie_name=?, categorie_description=?,categorie_image=? WHERE id=?";
$stmt= $this->pdo->prepare($sql);
$stmt->execute(array($c->getCategorieName(),$c->getCategorieDescription(),$c->getCategorieImage(),$c->getId()));
}
function delete($id) {
    $query = "delete from food_categories where id=?";
    $res=$this->pdo->prepare($query);
    return $res->execute(array($id));
    }

}
?>
