<?php

class ReviewModel {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function addReview($pseudo, $rating, $comment) {
        $query = "INSERT INTO reviews (pseudo, rating, comment) VALUES (:pseudo, :rating, :comment)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindParam(':rating', $rating, PDO::PARAM_INT);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getPendingReviews() {
        $query = "SELECT * FROM reviews WHERE status = 'pending' ORDER BY created_at DESC";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateReviewStatus($id, $status) {
        $query = "UPDATE reviews SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function getApprovedReviews() {
        $query = "SELECT * FROM reviews WHERE status = 'approved' ORDER BY created_at DESC";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
