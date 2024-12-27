<?php

class Animal {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Créer un nouvel animal
    public function create($name, $breed, $image, $habitatId) {
        try {
            $query = "INSERT INTO animals (name, breed, image, habitat_id) VALUES (:name, :breed, :image, :habitat_id)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':breed', $breed);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':habitat_id', $habitatId);

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la création de l'animal : " . $e->getMessage();
            return false;
        }
    }

    // Mettre à jour un animal
    public function update($id, $name, $breed, $image, $habitatId) {
        try {
            $query = "UPDATE animals SET name = :name, breed = :breed, image = :image, habitat_id = :habitat_id WHERE id = :id";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':breed', $breed);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':habitat_id', $habitatId);

            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la modification de l'animal : " . $e->getMessage();
            return false;
        }
    }

    // Supprimer un animal
    public function delete($id) {
        try {
            $query = "DELETE FROM animals WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id);
            return $stmt->execute();
        } catch (Exception $e) {
            echo "Erreur lors de la suppression de l'animal : " . $e->getMessage();
            return false;
        }
    }

    // Récupérer tous les animaux
    public function getAllAnimals() {
        try {
            $query = "
        SELECT a.id, a.name, a.breed, a.image, h.name AS habitat
        FROM animals a
        LEFT JOIN habitats h ON a.habitat_id = h.id";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur lors de la récupération des animaux : " . $e->getMessage();
            return [];
        }
    }

    // Récupérer tous les animaux
    public function getAllAnimal() {
        $sql = "SELECT id, name FROM animals ORDER BY name ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un animal par ID
    public function getAnimalById($id) {
    try {
        $query = "
            SELECT 
                a.*, 
                h.name AS habitat_name
            FROM animals a
            LEFT JOIN habitats h ON a.habitat_id = h.id
            WHERE a.id = :id
        ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Erreur lors de la récupération de l'animal : " . $e->getMessage();
        return null;
    }
}


    // Récupérer tous les habitats (pour associer un habitat à un animal)
    public function getHabitatOptions() {
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

    // Récupérer les animaux par habitat
    public function getAnimalsByHabitat($habitatId) {
        try {
            $query = "SELECT * FROM animals WHERE habitat_id = :habitat_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':habitat_id', $habitatId);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Erreur lors de la récupération des animaux par habitat : " . $e->getMessage();
            return [];
        }
    }
}