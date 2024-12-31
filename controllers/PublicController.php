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

    foreach ($habitats as $key => $habitat) {
        // Récupérer les animaux pour cet habitat
        $animals = $animalModel->getAnimalsByHabitat($habitat['id']);

        // Associer les animaux à cet habitat dans un tableau temporaire
        $habitats[$key]['animals'] = $animals;
    }
    require_once __DIR__ . '/../views/habitats.php';
    }

    public function notice() {
        require_once __DIR__ . '/../views/submit.php';
    }

    // Afficher les mentions légales
    public function legalNotice() {
        require_once __DIR__ . '/../views/legacy.php';
    }

    public function policy() {
        require_once __DIR__ . '/../views/policy.php';
    }

}
