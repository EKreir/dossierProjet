<?php include __DIR__ . '/../template/header.php';
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/employee-dashboard">Espace Employé</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/edit-services">Modifier les services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/add-feeding">Consommation quotidienne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manage-reviews">Aivs des visiteurs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manage-mails">Gérer les mails</a>
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
        <li><a href="/edit-services">Modifier les services</a></li>
        <li><a href="/add-feeding">Consommation quotidienne</a></li>
        <li><a href="/manage-reviews">Avis des visiteurs</a></li>
        <li><a href="/manage-mails">Gérer les mails</a></li>
    </ul>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
