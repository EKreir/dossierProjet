<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../models/User.php';

$action = $_GET['action'] ?? 'createUserForm';

switch ($action) {
    case 'createUserForm':
        require_once __DIR__ . '/../views/admin/create_user.php';
        break;

    case 'createUser':
        $userController = new UserController();
        $userController->createUser();
        break;

    case 'success':
        echo "<h1>Utilisateur créé avec succès !</h1>";
        echo "<a href='index.php?action=createUserForm'>Retour</a>";
        break;

    default:
        echo "<h1>ERREUR  :Action non reconnue!</h1>";
}
