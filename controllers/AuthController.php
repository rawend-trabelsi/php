<?php
session_start(); 

require_once '../models/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function login($email, $password) {
        $user = $this->userModel->loginUser($email, $password);

        if ($user) {
            header("Location: contact.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid email or password. Please try again.";
            header("Location: login.php?page=login");
            exit();
        }
    }

    public function signup($name, $email, $password) {
        $success = $this->userModel->registerUser($name, $email, $password);

        if ($success) {
            $_SESSION['signup_success'] = "Account created successfully!";
        } else {
            $_SESSION['signup_error'] = "Error creating account. Please try again.";
        }

        header("Location: signup.php");
        exit();
    }
}
?>
