<?php

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public static function getUserByUsername($username) {
        // On prépare la requête pour récupérer l'utilisateur basé sur le nom d'utilisateur
        $db = Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        // Vérifier si l'utilisateur existe et retourner les données
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;  // Retourner null si l'utilisateur n'existe pas
        }
    }


    public function create($username, $password, $role) {
        try {
            // Valider le rôle
            $validRoles = ['veterinarian', 'employee', 'admin'];
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