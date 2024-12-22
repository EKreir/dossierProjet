<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/Router.php';

// Initialiser le routeur
$router = new Router();

// Ajouter les routes
$router->add('/', function() {
    echo "<h1>Bienvenue sur l'application !</h1>";
    echo '<a href="/create-user">Créer un utilisateur</a>';
});

$router->add('/create-user', function() {
    require_once __DIR__ . '/../views/admin/create_user.php';
});

$router->add('/create-user-submit', function() {
    $userController = new UserController();
    $userController->createUser();
});

$router->add('/success', function() {
    echo "<h1>Utilisateur créé avec succès !</h1>";
    echo '<a href="/">Retour à l\'accueil</a>';
});

// Dispatcher la requête
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestPath);
