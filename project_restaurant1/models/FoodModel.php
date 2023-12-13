<?php

require_once('FoodModel.php');

class Food {
    private $id, $food_name, $food_categorie, $food_descraption, $food_price, $food_ingredient, $food_availibility, $food_image;

    function __construct($id = "", $food_name = "", $food_categorie = "", $food_descraption = "", $food_price = "", $food_ingredient = "", $food_availibility = "", $food_image = "") {
        $this->id = $id;
        $this->food_name = $food_name;
        $this->food_categorie = $food_categorie;
        $this->food_descraption = $food_descraption;
        $this->food_price = $food_price;
        $this->food_ingredient = $food_ingredient;
        $this->food_availibility = $food_availibility;
        $this->food_image = $food_image;
    }

    public function getId() {
        return $this->id;
    }

    public function getFoodName() {
        return $this->food_name;
    }

    public function getFoodCategorie() {
        return $this->food_categorie;
    }

    public function getFoodDescraption() {
        return $this->food_descraption;
    }

    public function getFoodPrice() {
        return $this->food_price;
    }

    public function getFoodIngredient() {
        return $this->food_ingredient;
    }

    public function getFoodAvailibility() {
        return $this->food_availibility;
    }

    public function getFoodImage() {
        return $this->food_image;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFoodName($food_name) {
        $this->food_name = $food_name;
    }

    public function setFoodCategorie($food_categorie) {
        $this->food_categorie = $food_categorie;
    }

    public function setFoodDescraption($food_descraption) {
        $this->food_descraption = $food_descraption;
    }

    public function setFoodPrice($food_price) {
        $this->food_price = $food_price;
    }

    public function setFoodIngredient($food_ingredient) {
        $this->food_ingredient = $food_ingredient;
    }

    public function setFoodAvailibility($food_availibility) {
        $this->food_availibility = $food_availibility;
    }

    public function setFoodImage($food_image) {
        $this->food_image = $food_image;
    }
}
?>
