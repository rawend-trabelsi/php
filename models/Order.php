<?php

class Order {
    private $order_id, $user_id, $food_name, $food_price, $quantity, $full_name, $contact, $email, $address, $order_date;

    function __construct($order_id = "", $user_id = "", $food_name = "", $food_price = "", $quantity = "", $full_name = "", $contact = "", $email = "", $address = "", $order_date = "") {
        $this->order_id = $order_id;
        $this->user_id = $user_id;
        $this->food_name = $food_name;
        $this->food_price = $food_price;
        $this->quantity = $quantity;
        $this->full_name = $full_name;
        $this->contact = $contact;
        $this->email = $email;
        $this->address = $address;
        $this->order_date = $order_date;
    }

    public function getOrderId() {
        return $this->order_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getFoodName() {
        return $this->food_name;
    }

    public function getFoodPrice() {
        return $this->food_price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getFullName() {
        return $this->full_name;
    }

    public function getContact() {
        return $this->contact;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getAddress()
    {
        return $this->address;
    }
    

    public function getOrderDate() {
        return $this->order_date;
    }

    
}
?>
