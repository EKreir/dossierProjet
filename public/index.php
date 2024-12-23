<?php

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/OpeningHoursController.php';
require_once __DIR__ . '/../controllers/HabitatController.php';
require_once __DIR__ . '/../controllers/AnimalController.php';
require_once __DIR__ . '/../controllers/ServiceController.php';
require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../models/OpeningHours.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Habitat.php';
require_once __DIR__ . '/../models/Animal.php';
require_once __DIR__ . '/../models/Service.php';
require_once __DIR__ . '/../config/Router.php';

// Démarrer la session
session_start();

// Définir les pages qui nécessitent un rôle "admin"
$adminPages = [
    '/admin-dashboard',
    '/create-user',
    '/showHours',
    '/list-habitats',
    '/list-animals',
    '/list-services'
];

// Définir les pages qui nécessitent un rôle "employee"
$employeePages = [
    '/employee-dashboard',
    '/edit-services'
];

// Vérification du rôle admin pour les pages sensibles
$currentPage = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Vérification pour les pages admin
if (in_array($currentPage, $adminPages)) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header('Location: /login');
        exit;
    }
}

// Vérification pour les pages employee
if (in_array($currentPage, $employeePages)) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {
        header('Location: /login');
        exit;
    }
}

// Initialiser le routeur
$router = new Router();

// Ajouter les routes

// Accueil (page d'accueil)
$router->add('/', function() {
    echo "<h1>Bienvenue sur l'application Zoo !</h1>";
    echo '<a href="/login">Se connecter</a><br>';
});

// Route de connexion
$router->add('/login', function() {
    require_once __DIR__ . '/../views/login.php'; // Page de connexion
});

// Route pour la soumission du formulaire de connexion
$router->add('/login-submit', function() {
    $loginController = new LoginController();
    $loginController->login();  // Appel de la méthode login du LoginController
});

// Route pour la déconnexion
$router->add('/logout', function() {
    session_start();
    session_destroy();
    header('Location: /login');
    exit;
});

// Route pour afficher l'espace admin (dashboard)
$router->add('/admin-dashboard', function() {
    require_once __DIR__ . '/../views/admin/admin-dashboard.php';  // Page du tableau de bord admin
});

// Route pour afficher l'espace employé (dashboard)
$router->add('/employee-dashboard', function() {
    require_once __DIR__ . '/../views/employe/employee-dashboard.php';  // Page du tableau de bord employé
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

// Routes pour les services
$router->add('/list-services', function() {
    $serviceController = new ServiceController();
    $serviceController->listServices();
});

$router->add('/create-service', function() {
    $serviceController = new ServiceController();
    $serviceController->createService();
});

$router->add('/create-service-submit', function() {
    $serviceController = new ServiceController();
    $serviceController->createService();
});

$router->add('/edit-service', function() {
    $serviceController = new ServiceController();
    $serviceController->editService();
});

$router->add('/delete-service', function() {
    $serviceController = new ServiceController();
    $serviceController->deleteService();
});

// Dispatcher la requête
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($requestPath);
