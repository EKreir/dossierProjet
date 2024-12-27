<?php

class PublicController {
    public function home() {
        $openingHoursController = new OpeningHoursController();
        $hours = $openingHoursController->getPublicHours();
        $reviewModel = new ReviewModel();
        $approvedReviews = $reviewModel->getApprovedReviews();
        require_once __DIR__ . '/../views/home.php';
    }

    public function services() {
        $serviceModel = new Service();
        $services = $serviceModel->getAllServices();
        require_once __DIR__ . '/../views/services.php';
    }

    public function showHabitats() {
    $habitatModel = new Habitat();
    $animalModel = new Animal();
    $habitats = $habitatModel->getAllHabitats();
    foreach ($habitats as &$habitat) {
        $habitat['animals'] = $animalModel->getAnimalsByHabitat($habitat['id']);
    }
    require_once __DIR__ . '/../views/habitats.php';
    }

    public function notice() {
        require_once __DIR__ . '/../views/submit.php';
    }

}
