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

<div class="container mt-4">
    <h1 class="text-center">Consommations des Animaux</h1>
    <p class="text-center">Voici les informations des consommations enregistrées par les employés :</p>

    <?php if (!empty($consumptions)) : ?>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Nom de l'animal</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Type de nourriture</th>
                    <th>Quantité (kg)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consumptions as $consumption) : ?>
                    <tr>
                        <td><?= htmlspecialchars($consumption['animal_name']) ?></td>
                        <td><?= htmlspecialchars($consumption['feed_date']) ?></td>
                        <td><?= htmlspecialchars($consumption['feed_time']) ?></td>
                        <td><?= htmlspecialchars($consumption['food_type']) ?></td>
                        <td><?= htmlspecialchars($consumption['quantity_kg']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p class="alert alert-info text-center">Aucune consommation enregistrée pour le moment.</p>
    <?php endif; ?>

</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
