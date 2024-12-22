<?php


class OpeningHoursController {
    private $model;

    public function __construct() {
        $this->model = new OpeningHours();
    }

    // Afficher les horaires d'ouverture
    public function showHours() {
    // Si la méthode est POST, on traite la mise à jour des horaires
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mettre à jour les horaires pour chaque jour
        foreach ($_POST['hours'] as $id => $times) {
            $this->model->update($id, $times['opening'], $times['closing']);
        }

        // Définir un message de succès
        $successMessage = "Horaires mis à jour avec succès !";

        // Récupérer les horaires après mise à jour
        $hours = $this->model->getAll();

        // Afficher la vue avec le message de succès
        require_once __DIR__ . '/../views/admin/opening_hours.php';
    } else {
        // Si la méthode est GET, on récupère les horaires sans mise à jour
        $hours = $this->model->getAll();
        require_once __DIR__ . '/../views/admin/opening_hours.php';
    }
}

    // Mettre à jour les horaires d'ouverture
    public function updateHours() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Mettre à jour les horaires pour chaque jour
            foreach ($_POST['hours'] as $id => $times) {
                $this->model->update($id, $times['opening'], $times['closing']);
            }
            // Rediriger vers la page de succès
            header('Location: /showHours&success=true');
            exit();
        }
    }
}