<?php

require_once __DIR__ . '/../config/Database.php';

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($username, $password, $role) {
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($query);

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }
}