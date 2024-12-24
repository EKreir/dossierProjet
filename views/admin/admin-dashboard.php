<?php include __DIR__ . '/../template/header.php'; ?>

<!-- Titre principal avec Bootstrap -->
<div class="container my-5">
    <h1 class="text-center">Bienvenue dans l'espace Admin</h1>

    <!-- Navigation avec un style Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
        <div class="container-fluid">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/create-user">Créer un utilisateur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/showHours">Gérer les horaires d'ouverture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list-habitats">Gérer les habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list-animals">Gérer les animaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list-services">Gérer les services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Comptes renuds</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Bouton de déconnexion -->
    <div class="text-center">
        <a href="/logout" class="btn btn-danger">Se déconnecter</a>
    </div>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
