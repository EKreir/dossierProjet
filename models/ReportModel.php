<?php

class ReportModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Récupérer tous les rapports pour les animaux
    public function getAllReports() {
        $sql = "SELECT 
                    animals.name AS animal_name, 
                    animal_reports.report_date, 
                    animal_reports.health_status, 
                    animal_reports.food_type, 
                    animal_reports.food_quantity_kg,
                    users.username AS vet_name
                FROM animal_reports
                INNER JOIN animals ON animal_reports.animal_id = animals.id
            INNER JOIN users ON animal_reports.user_id = users.id
            WHERE users.role = 'veterinarian'
            ORDER BY animal_reports.report_date DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajouter un nouveau rapport
    public function addReport($animalId, $reportDate, $healthStatus, $foodType, $foodQuantityKg, $userId) {
    $sql = "INSERT INTO animal_reports (animal_id, report_date, health_status, food_type, food_quantity_kg, user_id)
            VALUES (:animal_id, :report_date, :health_status, :food_type, :food_quantity_kg, :user_id)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':animal_id', $animalId);
    $stmt->bindParam(':report_date', $reportDate);
    $stmt->bindParam(':health_status', $healthStatus);
    $stmt->bindParam(':food_type', $foodType);
    $stmt->bindParam(':food_quantity_kg', $foodQuantityKg);
    $stmt->bindParam(':user_id', $userId);

    return $stmt->execute();
}
}
