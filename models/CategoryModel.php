<?php
require_once('CategoryModel.php');

class Categorie {
    private $id, $categorie_name, $categorie_description, $categorie_image;

    function __construct($id = "", $categorie_name = "", $categorie_description = "", $categorie_image = "") {
        $this->id = $id;
        $this->categorie_name = $categorie_name;
        $this->categorie_description = $categorie_description;
        $this->categorie_image = $categorie_image;
    }

    public function getId() {
        return $this->id;
    }

    public function getCategorieName() {
        return $this->categorie_name;
    }

    public function getCategorieDescription() {
        return $this->categorie_description;
    }

    public function getCategorieImage() {
        return $this->categorie_image;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCategorieName($categorie_name) {
        $this->categorie_name = $categorie_name;
    }

    public function setCategorieDescription($categorie_description) {
        $this->categorie_description = $categorie_description;
    }

    public function setCategorieImage($categorie_image) {
        $this->categorie_image = $categorie_image;
    }
   
}
?>
