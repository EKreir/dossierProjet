<?php

class FeedingModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addFeeding($animalId, $feedDate, $feedTime, $foodType, $quantityKg) {
        $stmt = $this->conn->prepare("INSERT INTO animal_feedings (animal_id, feed_date, feed_time, food_type, quantity_kg) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$animalId, $feedDate, $feedTime, $foodType, $quantityKg]);
    }

    public function getFeedingsByAnimal($animalId) {
        $stmt = $this->conn->prepare("SELECT * FROM animal_feedings WHERE animal_id = ? ORDER BY feed_date DESC, feed_time DESC");
        $stmt->execute([$animalId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
