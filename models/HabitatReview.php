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

public function getAllReviews() {
    $sql = "SELECT 
                habitats.name AS habitat_name, 
                habitat_reviews.review_date, 
                habitat_reviews.review_text, 
                users.username AS vet_name
            FROM habitat_reviews
            INNER JOIN habitats ON habitat_reviews.habitat_id = habitats.id
            INNER JOIN users ON habitat_reviews.user_id = users.id
            WHERE users.role = 'veterinarian'
            ORDER BY habitat_reviews.review_date DESC";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function getReviewsSortedByDate($sort) {
        $order = 'ASC';
        if ($sort === 'habitat_reviews_desc') {
            $order = 'DESC';
        } elseif ($sort === 'habitat_reviews_asc') {
            $order = 'ASC';
        }

        $query = "
            SELECT 
                habitats.name AS habitat_name, 
                habitat_reviews.review_date, 
                habitat_reviews.review_text, 
                users.username AS vet_name
            FROM habitat_reviews
            INNER JOIN habitats ON habitat_reviews.habitat_id = habitats.id
            INNER JOIN users ON habitat_reviews.user_id = users.id
            WHERE users.role = 'veterinarian'
            ORDER BY habitat_reviews.review_date $order
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



}
