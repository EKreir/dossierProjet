<?php

class Habitat {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Créer un nouvel habitat
    public function create($name, $description, $image) {
        try {
            $query = "INSERT INTO habitats (name, description, images) VALUES (:name, :description, :image)";
            $stmt = $this->conn->prepare($query);
            
            // Binding des paramètres
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image);

            // Exécution de la requête
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception('Erreur lors de l\'exécution de la requête');
            }
        } catch (Exception $e) {
            echo "Erreur lors de la création de l'habitat : " . $e->getMessage();
            return false;
        }
    }

    // Mettre à jour un habitat
    public function update($id, $name, $description, $image) {
        try {
            $query = "UPDATE habitats SET name = :name, description = :description, images = :image WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            
            // Binding des paramètres
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image);

            // Exécution de la requête
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception('Erreur lors de la mise à jour de l\'habitat');
            }
        } catch (Exception $e) {
            echo "Erreur lors de la mise à jour de l'habitat : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer un habitat par son ID
    public function getHabitatById($id) {
        try {
            $query = "SELECT * FROM habitats WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur lors de la récupération de l'habitat : " . $e->getMessage();
            return null;
        }
    }

    // Récupérer tous les habitats
    public function getAllHabitats() {
        try {
            $query = "SELECT * FROM habitats";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur lors de la récupération des habitats : " . $e->getMessage();
            return [];
        }
    }

    // Supprimer un habitat
    public function deleteHabitat($id) {
        try {
            $query = "DELETE FROM habitats WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception('Erreur lors de la suppression de l\'habitat');
            }
        } catch (Exception $e) {
            echo "Erreur lors de la suppression de l'habitat : " . $e->getMessage();
            return false;
        }
    }
}
