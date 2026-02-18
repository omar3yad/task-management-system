<?php
class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $username;
    public $password;

    public function __construct($db) {
        $this->conn = $db;
    }

public function login($username, $password) {
    $query = "SELECT * FROM users WHERE username = :user AND password = :pass LIMIT 1";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([
        ':user' => $username,
        ':pass' => $password 
    ]);

    return $stmt->fetch();
}
}