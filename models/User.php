<?php

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create($username, $password, $role) {
        try {
            // Valider le rôle
            $validRoles = ['veterinarian', 'employee'];
            if (!in_array($role, $validRoles)) {
                throw new Exception("Rôle invalide.");
            }

            // Préparer la requête d'insertion
            $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
            $stmt = $this->conn->prepare($query);

            // Hacher le mot de passe
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Lier les paramètres
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':role', $role);

            // Exécuter la requête
            return $stmt->execute();
        } catch (Exception $e) {
            // Log l'erreur (facultatif : ici tu pourrais logger l'erreur dans un fichier ou dans une base de données)
            error_log("Erreur lors de la création de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }
}
