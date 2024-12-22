<?php

class OpeningHours {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM opening_hours";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $openingTime, $closingTime) {
        $query = "UPDATE opening_hours SET opening_time = :opening_time, closing_time = :closing_time WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':opening_time', $openingTime);
        $stmt->bindParam(':closing_time', $closingTime);
        return $stmt->execute();
    }
}