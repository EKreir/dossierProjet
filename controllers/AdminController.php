<?php

class AdminController {
    private $reportModel;
    private $habitatReviewModel;

    public function __construct() {
        $this->reportModel = new ReportModel();
        $this->habitatReviewModel = new HabitatReview();
    }

    public function dashboard() {
        // Récupérer les rapports des animaux
        $animalReports = $this->reportModel->getAllReports();

        // Récupérer les avis sur les habitats
        $habitatReviews = $this->habitatReviewModel->getAllReviews();

        // Charger la vue
        require_once __DIR__ . '/../views/admin/dashboard.php';
    }
}
