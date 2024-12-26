<?php

class PublicController {
    public function home() {
        // Récupération des horaires d'ouverture
        $openingHoursController = new OpeningHoursController();
        $hours = $openingHoursController->getPublicHours();

        // Charger la vue pour l'accueil
        require_once __DIR__ . '/../views/home.php';
    }

    public function services() {
        $serviceModel = new Service();
        $services = $serviceModel->getAllServices(); // Récupérer tous les services
        // Afficher la page des services avec les données
        require_once __DIR__ . '/../views/services.php';
    }
}
