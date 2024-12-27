<?php include __DIR__ . '/../template/header.php'; ?>

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

<h1 class="text-center my-4">Rapports des Animaux</h1>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nom de l'animal</th>
                <th>Date</th>
                <th>État de santé</th>
                <th>Type de nourriture</th>
                <th>Quantité (kg)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reports as $report): ?>
                <tr>
                    <td><?= htmlspecialchars($report['animal_name']) ?></td>
                    <td><?= htmlspecialchars($report['report_date']) ?></td>
                    <td><?= htmlspecialchars($report['health_status']) ?></td>
                    <td><?= htmlspecialchars($report['food_type']) ?></td>
                    <td><?= htmlspecialchars($report['food_quantity_kg']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/add-animal-report" class="btn btn-primary">Ajouter un rapport</a>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
