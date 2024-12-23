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

    public function getAllConsumptions() {
    $sql = "SELECT 
                animals.name AS animal_name, 
                animal_feedings.feed_date, 
                animal_feedings.feed_time, 
                animal_feedings.food_type, 
                animal_feedings.quantity_kg
            FROM animal_feedings 
            INNER JOIN animals ON animal_feedings.animal_id = animals.id 
            ORDER BY animal_feedings.feed_date DESC, animal_feedings.feed_time DESC";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}
