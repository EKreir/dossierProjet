<?php

class HabitatReview {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ajouter un avis sur un habitat
    public function addReview($habitatId, $userId, $reviewDate, $reviewText) {
    $sql = "INSERT INTO habitat_reviews (habitat_id, user_id, review_date, review_text)
            VALUES (:habitat_id, :user_id, :review_date, :review_text)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':habitat_id', $habitatId);
    $stmt->bindParam(':user_id', $userId);
    $stmt->bindParam(':review_date', $reviewDate);
    $stmt->bindParam(':review_text', $reviewText);
    return $stmt->execute();
}
}
