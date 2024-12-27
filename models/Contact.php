<?php

class Contact {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($title, $email, $message) {
        try {
            $query = "INSERT INTO contacts (title, email, message) VALUES (:title, :email, :message)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi du message : " . $e->getMessage();
            return false;
        }
    }
}
