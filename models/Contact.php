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

    // Récupérer un mail par ID
    public function getMailById($id) {
        $query = $this->conn->prepare('SELECT * FROM contacts WHERE id = :id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllMails() {
        $query = $this->conn->prepare('SELECT * FROM contacts ORDER BY created_at DESC');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
