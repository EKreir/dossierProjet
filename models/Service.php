<?php

class Service {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Créer un service
    public function create($name, $description, $imagePath) {
        try {
            $query = "INSERT INTO services (name, description, image) VALUES (:name, :description, :image)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $imagePath);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la création du service : " . $e->getMessage();
            return false;
        }
    }

    // Lister tous les services
    public function getAllServices() {
        $query = "SELECT * FROM services";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mettre à jour un service
    public function update($id, $name, $description, $imagePath) {
        try {
            // Si l'image est vide, ne pas inclure la colonne 'image' dans la requête
            $query = "UPDATE services SET name = :name, description = :description, image = :image WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $imagePath);

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour du service : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer un service par son ID
    public function getServiceById($id) {
        $query = "SELECT * FROM services WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Supprimer un service
    public function delete($id) {
        try {
            $query = "DELETE FROM services WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la suppression du service : " . $e->getMessage();
            return false;
        }
    }
}