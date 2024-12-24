<?php

class FeedingController {
    private $feedingModel;
    private $animalModel;

    public function __construct($feedingModel, $animalModel) {
        $this->feedingModel = $feedingModel;
        $this->animalModel = $animalModel;
    }

    public function addFeeding() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $animal_id = $_POST['animal_id'];
            $feed_date = $_POST['feed_date'];
            $feed_time = $_POST['feed_time'];
            $food_type = trim($_POST['food_type']);
            $quantity_kg = trim($_POST['quantity_kg']);

            if (empty($animal_id) || empty($feed_date) || empty($feed_time) || empty($food_type) || empty($quantity_kg)) {
                $errorMessage = "Tous les champs sont obligatoires.";
            } else {
                $success = $this->feedingModel->addFeeding($animal_id, $feed_date, $feed_time, $food_type, $quantity_kg);

                if ($success) {
                    $successMessage = "Alimentation enregistrée avec succès !";
                } else {
                    $errorMessage = "Une erreur est survenue lors de l'enregistrement.";
                }
            }
        }

        // Récupérer tous les animaux pour le formulaire
        $animals = $this->animalModel->getAllAnimals();
        require_once __DIR__ . '/../views/employe/add_feeding.php';
    }

    public function listConsumptions() {
    $feedingModel = new FeedingModel();
    $consumptions = $feedingModel->getAllConsumptions();
    require_once __DIR__ . '/../views/veto/animal_consumptions.php';
}

}
