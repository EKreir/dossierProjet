<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/OpeningHoursController.php';
require_once __DIR__ . '/../controllers/HabitatController.php';
require_once __DIR__ . '/../controllers/AnimalController.php';
require_once __DIR__ . '/../models/OpeningHours.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Habitat.php';
require_once __DIR__ . '/../models/Animal.php';
require_once __DIR__ . '/../config/Router.php';

// Initialiser le routeur
$router = new Router();

// Ajouter les routes

// Accueil
$router->add('/', function() {
    echo "<h1>Bienvenue sur l'application Zoo !</h1>";
    echo '<a href="/create-user">Créer un utilisateur</a><br>';
    echo '<a href="/showHours">Gérer les horaires d\'ouverture</a><br>';
    echo '<a href="/list-habitats">Gérer les habitats</a><br>';
    echo '<a href="/list-animals">Gérer les animaux</a><br>';
});

// Routes utilisateurs
$router->add('/create-user', function() {
    require_once __DIR__ . '/../views/admin/create_user.php';
});

$router->add('/create-user-submit', function() {
    $userController = new UserController();
    $userController->createUser();
});

// Routes horaires d'ouverture
$router->add('/showHours', function() {
    $openingHoursController = new OpeningHoursController();
    $openingHoursController->showHours();
});

$router->add('/updateHours', function() {
    $openingHoursController = new OpeningHoursController();
    $openingHoursController->updateHours();
});

// Routes pour les habitats
$router->add('/list-habitats', function() {
    $habitatController = new HabitatController();
    $habitatController->listHabitats();
});

$router->add('/create-habitat', function() {
    $habitatController = new HabitatController();
    $habitatController->createHabitat();
});

$router->add('/create-habitat-submit', function() {
    $habitatController = new HabitatController();
    $habitatController->createHabitat();
});

$router->add('/edit-habitat', function() {
    $habitatController = new HabitatController();
    $habitatController->editHabitat();
});

$router->add('/delete-habitat', function() {
    $habitatController = new HabitatController();
    $habitatController->deleteHabitat();
});

// Routes pour les animaux
$router->add('/list-animals', function() {
    $animalController = new AnimalController();
    $animalController->listAnimals();
});

$router->add('/create-animal', function() {
    $animalController = new AnimalController();
    $animalController->createAnimal();
});

$router->add('/create-animal-submit', function() {
    $animalController = new AnimalController();
    $animalController->createAnimal();
});

$router->add('/edit-animal', function() {
    $animalController = new AnimalController();
    $animalController->editAnimal();
});

$router->add('/delete-animal', function() {
    $animalController = new AnimalController();
    $animalController->deleteAnimal();
});

// Dispatcher la requête
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestPath);
