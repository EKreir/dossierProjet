<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header('Location: /login');
    exit;
}
?>

<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Bienvenue dans l'espace Admin</h1>

<nav>
    <ul>
        <li><a href="/create-user">Créer un utilisateur</a></li>
        <li><a href="/showHours">Gérer les horaires d'ouverture</a></li>
        <li><a href="/list-habitats">Gérer les habitats</a></li>
        <li><a href="/list-animals">Gérer les animaux</a></li>
        <li><a href="/list-services">Gérer les services</a></li>
    </ul>
</nav>

<a href="/logout" class="btn btn-danger">Se déconnecter</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
