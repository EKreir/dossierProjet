<?php

class ReportController {
    private $reportModel;

    public function __construct() {
        $this->reportModel = new ReportModel();
    }

    // Afficher tous les rapports
    public function listReports() {
        $reports = $this->reportModel->getAllReports();
        require_once __DIR__ . '/../views/veto/reports.php';
    }

    // Ajouter un nouveau rapport
    public function addReport() {
    $animalModel = new Animal();
    $animals = $animalModel->getAllAnimal();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $animalId = $_POST['animal_id'];
        $reportDate = $_POST['report_date'];
        $healthStatus = $_POST['health_status'];
        $foodType = $_POST['food_type'];
        $foodQuantityKg = $_POST['food_quantity_kg'];

        $success = $this->reportModel->addReport($animalId, $reportDate, $healthStatus, $foodType, $foodQuantityKg);

        if ($success) {
            header('Location: /animal-reports');
            exit;
        } else {
            $errorMessage = "Une erreur est survenue lors de l'ajout du rapport.";
        }
    }

    require_once __DIR__ . '/../views/veto/add_report.php';
}
}
