<?php

class AnimalController {
    private $animalModel;

    public function __construct() {
        $this->animalModel = new Animal();
    }

    // Afficher tous les animaux
    public function listAnimals() {
        $animals = $this->animalModel->getAllAnimals();
        require_once __DIR__ . '/../views/admin/list_animals.php';
    }

    // Créer un nouvel animal
    public function createAnimal() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $breed = trim($_POST['breed']);
            $habitat_id = (int) $_POST['habitat_id'];

            if (empty($name) || empty($breed) || empty($habitat_id)) {
                $errorMessage = "Tous les champs sont obligatoires.";
                require_once __DIR__ . '/../views/admin/create_animal.php';
                return;
            }

            // Gérer l'upload de l'image
            $imagePath = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $imagePath = '/images/' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../public' . $imagePath);
            }

            // Ajouter l'animal dans la base de données
            $success = $this->animalModel->create($name, $breed, $imagePath, $habitat_id);

            if ($success) {
                $successMessage = "Animal créé avec succès !";
            } else {
                $errorMessage = "Une erreur est survenue lors de la création de l'animal.";
            }

            require_once __DIR__ . '/../views/admin/create_animal.php';
        } else {
            $habitats = $this->animalModel->getHabitatOptions();
            require_once __DIR__ . '/../views/admin/create_animal.php';
        }
    }

    // Modifier un animal
    public function editAnimal() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Animal introuvable.";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $breed = trim($_POST['breed']);
            $habitat_id = (int) $_POST['habitat_id'];

            if (empty($name) || empty($breed) || empty($habitat_id)) {
                $errorMessage = "Tous les champs sont obligatoires.";
                require_once __DIR__ . '/../views/admin/edit_animal.php';
                return;
            }

            // Gérer l'upload de l'image
            $imagePath = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $imagePath = '/images/' . basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../public' . $imagePath);
            }

            // Mettre à jour l'animal
            $success = $this->animalModel->update($id, $name, $breed, $imagePath, $habitat_id);

            if ($success) {
                $successMessage = "Animal modifié avec succès !";
            } else {
                $errorMessage = "Une erreur est survenue lors de la modification de l'animal.";
            }

            require_once __DIR__ . '/../views/admin/edit_animal.php';
        } else {
            $animal = $this->animalModel->getAnimalById($id);
            $habitats = $this->animalModel->getHabitatOptions();
            require_once __DIR__ . '/../views/admin/edit_animal.php';
        }
    }

    // Supprimer un animal
    public function deleteAnimal() {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Animal introuvable.";
            return;
        }

        $success = $this->animalModel->delete($id);

        if ($success) {
            header('Location: /list-animals');
            exit;
        } else {
            echo "Une erreur est survenue lors de la suppression de l'animal.";
        }
    }

    public function showAnimalDetails() {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "Identifiant de l'animal manquant.";
        return;
    }

    $animal = $this->animalModel->getAnimalById($id);

    if (!$animal) {
        echo "Animal introuvable.";
        return;
    }

    // Ajouter ou mettre à jour le compteur de consultations dans MongoDB
    $mongo = new MongoDBConnection();
    $collection = $mongo->getCollection('animal_views');

    // Chercher si un document existe déjà pour cet animal
    $existingView = $collection->findOne(['animal_id' => (int)$id]);

    if ($existingView) {
        // Si le document existe, mettre à jour le compteur
        $collection->updateOne(
            ['animal_id' => (int)$id],
            ['$inc' => ['views_count' => 1]]
        );
    } else {
        // Si le document n'existe pas, créer un nouveau document
        $collection->insertOne([
            'animal_id' => (int)$id,
            'views_count' => 1
        ]);
    }

    $reportModel = new ReportModel();
    $report = $reportModel->getLastReportByAnimalId($id);

    // Passe les données à la vue
    require_once __DIR__ . '/../views/animal_details.php';
}

    // Afficher tous les animaux avec leur nombre de consultations
    public function showAnimalCount() {
        // Récupérer tous les animaux avec leur nombre de vues
        $animals = $this->animalModel->getAllAnimals();
        // Passer les données à la vue
        require_once __DIR__ . '/../views/admin/animal_count.php';
    }

}
