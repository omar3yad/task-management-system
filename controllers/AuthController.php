<?php
// controllers/AuthController.php

class AuthController {
    private $userModel;
    private $db;

    public function __construct($database) {
        $this->db = $database->getConnection();
        require_once 'models/User.php';
        $this->userModel = new User($this->db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userData = $this->userModel->login($username, $password);

            if ($userData) {
                if (session_status() === PHP_SESSION_NONE) { session_start(); }
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['username'] = $userData['username'];
                
                header("Location: index.php?action=home");
                exit();
            } else {
                return "اسم المستخدم أو كلمة المرور غير صحيحة!";
            }
        }
        require_once 'views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}