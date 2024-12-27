<?php

class AdminController {
    private $reportModel;
    private $habitatReviewModel;

    public function __construct() {
        $this->reportModel = new ReportModel();
        $this->habitatReviewModel = new HabitatReview();
    }

    public function dashboard() {
        $sort = isset($_GET['sort']) ? $_GET['sort'] : null;

        $animalReports = $this->reportModel->getReportsSortedByDate($sort);

        $habitatReviews = $this->habitatReviewModel->getReviewsSortedByDate($sort);

        require_once __DIR__ . '/../views/admin/dashboard.php';
    }

}
