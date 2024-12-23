<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/OpeningHoursController.php';
require_once __DIR__ . '/../controllers/HabitatController.php'; // Ajout du contrôleur Habitat
require_once __DIR__ . '/../models/OpeningHours.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Habitat.php'; // Ajout du modèle Habitat
require_once __DIR__ . '/../config/Router.php';

// Initialiser le routeur
$router = new Router();

// Ajouter les routes

// Accueil
$router->add('/', function() {
    echo "<h1>Bienvenue sur l'application !</h1>";
    echo '<a href="/create-user">Créer un utilisateur</a>';
    echo '<br><a href="/showHours">Gérer les horaires d\'ouverture</a>';
    echo '<br><a href="/list-habitats">Voir les habitats</a>';
});

// Création d'un utilisateur
$router->add('/create-user', function() {
    require_once __DIR__ . '/../views/admin/create_user.php';
});

// Soumettre un utilisateur
$router->add('/create-user-submit', function() {
    $userController = new UserController();
    $userController->createUser();
});

// Afficher les horaires
$router->add('/showHours', function() {
    $openingHoursController = new OpeningHoursController();
    $openingHoursController->showHours();
});

// Mettre à jour les horaires
$router->add('/updateHours', function() {
    $openingHoursController = new OpeningHoursController();
    $openingHoursController->updateHours();
});

// Lister les habitats
$router->add('/list-habitats', function() {
    $habitatController = new HabitatController();
    $habitatController->listHabitats();
});

// Créer un habitat
$router->add('/create-habitat', function() {
    $habitatController = new HabitatController();
    $habitatController->createHabitat();
});

// Modifier un habitat
$router->add('/edit-habitat', function() {
    $habitatController = new HabitatController();
    $habitatController->editHabitat();
});

// Supprimer un habitat
$router->add('/delete-habitat', function() {
    $habitatController = new HabitatController();
    $habitatController->deleteHabitat();
});

// Dispatcher la requête
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestPath);

