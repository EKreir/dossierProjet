<?php

class ServiceController {
    private $serviceModel;

    public function __construct() {
        $this->serviceModel = new Service();
    }

    // Afficher la liste des services
    public function listServices() {
        $services = $this->serviceModel->getAllServices();
        require_once __DIR__ . '/../views/admin/list_services.php';
    }

    // Créer un service
    public function createService() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $image = $_FILES['image'] ?? null;

            if (empty($name) || empty($description)) {
                $errorMessage = "Tous les champs sont obligatoires.";
                require_once __DIR__ . '/../views/admin/create_service.php';
                return;
            }

            // Gérer l'upload de l'image
            $imagePath = '';
            if ($image && $image['error'] === 0) {
                $imagePath = '/images/' . basename($image['name']);
                move_uploaded_file($image['tmp_name'], __DIR__ . '/../public' . $imagePath);
            }

            // Ajouter le service dans la base de données
            $success = $this->serviceModel->create($name, $description, $imagePath);

            if ($success) {
                $successMessage = "Service créé avec succès !";
            } else {
                $errorMessage = "Une erreur est survenue lors de la création du service.";
            }

            require_once __DIR__ . '/../views/admin/create_service.php';
        } else {
            require_once __DIR__ . '/../views/admin/create_service.php';
        }
    }

    // Récupérer la liste des services pour l'employé
    public function listService() {
        // Récupérer tous les services existants
        $services = $this->serviceModel->getAllServices();

        // Passer la liste à la vue
        require_once __DIR__ . '/../views/employe/edit_service.php';
    }

    // Afficher le formulaire de modification
    public function editService() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Service introuvable.";
            return;
        }

        // Récupérer le service à modifier
        $service = $this->serviceModel->getServiceById($id);

        // Récupérer tous les services pour la sélection
        $services = $this->serviceModel->getAllServices();

        require_once __DIR__ . '/../views/employe/edit_service.php';
    }

    // Mettre à jour un service
    public function updateService() {
        $id = $_POST['id'] ?? null;

        if (!$id) {
            echo "Service introuvable.";
            return;
        }

        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $image = $_FILES['image'] ?? null;

        if (empty($name) || empty($description)) {
            $errorMessage = "Tous les champs sont obligatoires.";
            require_once __DIR__ . '/../views/employe/edit_service.php';
            return;
        }

        // Gérer l'upload de l'image
        $imagePath = '';
        if ($image && $image['error'] === 0) {
            $imagePath = '/images/' . basename($image['name']);
            move_uploaded_file($image['tmp_name'], __DIR__ . '/../public' . $imagePath);
        }

        // Mettre à jour le service dans la base de données
        $success = $this->serviceModel->update($id, $name, $description, $imagePath);

        if ($success) {
            $successMessage = "Service modifié avec succès !";
        } else {
            $errorMessage = "Une erreur est survenue lors de la modification du service.";
        }

        // Récupérer tous les services pour la sélection
        $services = $this->serviceModel->getAllServices();

        // Récupérer le service mis à jour
        $service = $this->serviceModel->getServiceById($id);

        require_once __DIR__ . '/../views/employe/edit_service.php';
    }

    // Supprimer un service
    public function deleteService() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Service introuvable.";
            return;
        }

        $success = $this->serviceModel->delete($id);

        if ($success) {
            header('Location: /list-services');
            exit;
        } else {
            echo "Une erreur est survenue lors de la suppression du service.";
        }
    }
}