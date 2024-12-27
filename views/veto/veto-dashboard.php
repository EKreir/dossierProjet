<?php include __DIR__ . '/../template/header.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/veto-dashboard">Espace Vétérinaire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/animal-consumptions">Consommation animale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/animal-reports">Rapports animaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/add-habitat-review">Avis des habitats</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger" href="/logout">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Contenu principal de l'espace Employé -->
<div class="container mt-4">
    <h1>Bienvenue dans votre espace Employé</h1>
    <h3>Actions disponibles</h3>
    <ul>
        <li><a href="/animal-consumptions">Consommation animale</a></li>
        <li><a href="/animal-reports">Rapports animaux</a></li>
        <li><a href="/add-habitat-review">Avis des habitats</a></li>
    </ul>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
