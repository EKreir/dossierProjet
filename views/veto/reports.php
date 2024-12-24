<?php include __DIR__ . '/../template/header.php'; ?>

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
    <a href="/veto-dashboard" class="btn btn-secondary">Retour au tableau de bord</a>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
