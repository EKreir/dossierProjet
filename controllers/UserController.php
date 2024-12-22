<?php

class UserController {

    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function createUser() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $role = trim($_POST['role']); // Récupérer le rôle sélectionné

        // Valider les entrées
        if (empty($username) || empty($password) || empty($role)) {
            $errorMessage = "Tous les champs sont obligatoires.";
            require_once __DIR__ . '/../views/admin/create_user.php';
            return;
        }

        // Vérifier que le rôle est valide (par rapport à l'ENUM)
        $validRoles = ['veterinarian', 'employee'];
        if (!in_array($role, $validRoles)) {
            $errorMessage = "Rôle invalide. Veuillez choisir un rôle valide.";
            require_once __DIR__ . '/../views/admin/create_user.php';
            return;
        }

        // Créer un nouvel utilisateur
        $userCreated = $this->model->create($username, $password, $role);

        // Si l'utilisateur a été créé avec succès
        if ($userCreated) {
            $successMessage = "Utilisateur créé avec succès !";
        } else {
            $errorMessage = "Une erreur est survenue lors de la création de l'utilisateur.";
        }

        // Afficher à nouveau le formulaire avec le message de succès ou d'erreur
        require_once __DIR__ . '/../views/admin/create_user.php';
    } else {
        // Si ce n'est pas une requête POST, on affiche le formulaire de création d'utilisateur vide
        require_once __DIR__ . '/../views/admin/create_user.php';
    }
}

}
