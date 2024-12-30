<?php

class HabitatController {
    private $habitatModel;
    private $habitatReview;

    public function __construct() {
        $this->habitatModel = new Habitat();
        $this->habitatReview = new HabitatReview();
    }

    // Afficher la liste des habitats
    public function listHabitats() {
        $habitats = $this->habitatModel->getAllHabitats();
        require_once __DIR__ . '/../views/admin/list_habitats.php';
    }

    // Créer un nouvel habitat
    public function createHabitat() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $image = $_FILES['images'] ?? null;

            // Vérification que les champs requis sont remplis
            if (empty($name) || empty($description)) {
                $errorMessage = "Tous les champs sont obligatoires.";
                require_once __DIR__ . '/../views/admin/create_habitat.php';
                return;
            }

            // Gérer l'upload de l'image
            $imagePath = '';
            if ($image && $image['error'] === 0) {
                $imagePath = '/images/' . basename($image['name']);
                move_uploaded_file($image['tmp_name'], __DIR__ . '/../public' . $imagePath);
            }

            // Ajouter l'habitat dans la base de données
            $success = $this->habitatModel->create($name, $description, $imagePath);

            // Vérification de l'ajout dans la base
            if ($success) {
                $successMessage = "Habitat créé avec succès !";
                require_once __DIR__ . '/../views/admin/create_habitat.php';
            } else {
                $errorMessage = "Une erreur est survenue lors de la création de l'habitat.";
                require_once __DIR__ . '/../views/admin/create_habitat.php';
            }
        } else {
            require_once __DIR__ . '/../views/admin/create_habitat.php';
        }
    }

    // Modifier un habitat
    public function editHabitat() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Habitat introuvable.";
            return;
        }

        // Récupérer les informations de l'habitat
        $habitat = $this->habitatModel->getHabitatById($id);
        if (!$habitat) {
            echo "Habitat introuvable.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $image = $_FILES['images'] ?? null;

            // Vérification que les champs requis sont remplis
            if (empty($name) || empty($description)) {
                $errorMessage = "Tous les champs sont obligatoires.";
                require_once __DIR__ . '/../views/admin/edit_habitat.php';
                return;
            }

            // Gérer l'upload de l'image
            $imagePath = $habitat['image']; // Utiliser l'image existante par défaut
            if ($image && $image['error'] === 0) {
                $imagePath = '/images/' . basename($image['name']);
                move_uploaded_file($image['tmp_name'], __DIR__ . '/../public' . $imagePath);
            }

            // Mettre à jour l'habitat
            $success = $this->habitatModel->update($id, $name, $description, $imagePath);

            // Vérification de la mise à jour
            if ($success) {
                $successMessage = "Habitat modifié avec succès !";
                $habitat = $this->habitatModel->getHabitatById($id); // Récupérer à nouveau les données mises à jour
            } else {
                $errorMessage = "Une erreur est survenue lors de la modification de l'habitat.";
            }

            require_once __DIR__ . '/../views/admin/edit_habitat.php';
        } else {
            require_once __DIR__ . '/../views/admin/edit_habitat.php';
        }
    }

    // Supprimer un habitat
    public function deleteHabitat() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Habitat introuvable.";
            return;
        }

        $success = $this->habitatModel->deleteHabitat($id);

        if ($success) {
            header('Location: /list-habitats');
            exit;
        } else {
            echo "Une erreur est survenue lors de la suppression de l'habitat.";
        }
    }

    // Ajouter un avis sur un habitat
    public function addReview() {    
    // Vérifiez si un utilisateur est connecté
    if (!isset($_SESSION['user_id'])) {
        header('Location: /login');
        exit;
    }

    $userId = $_SESSION['user_id'];

    // Vérifiez si l'utilisateur est un vétérinaire
    $userModel = new User();
    $user = $userModel->getUserById($userId);

    if (!$user || $user['role'] !== 'veterinarian') {
        die("Accès refusé : Vous devez être vétérinaire pour ajouter un avis.");
    }

    // Charger les habitats pour le formulaire
    $habitats = $this->habitatModel->getAllHabitats();
    $errorMessage = null;
    $successMessage = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $habitatId = $_POST['habitat_id'];
        $reviewDate = $_POST['review_date'];
        $reviewText = trim($_POST['review_text']);

        if (empty($reviewText)) {
            $errorMessage = "Le champ avis ne peut pas être vide.";
        } else {
            // Ajouter l'avis
            $success = $this->habitatReview->addReview($habitatId, $userId, $reviewDate, $reviewText);

            if ($success) {
                $successMessage = "Avis ajouté avec succès.";
            } else {
                $errorMessage = "Une erreur est survenue lors de l'ajout de l'avis.";
            }
        }
    }

    // Charger la vue avec les messages et les habitats
    require_once __DIR__ . '/../views/veto/add_habitat_review.php';
}

}
