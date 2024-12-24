<?php include __DIR__ . '/../template/header.php'; ?>

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

    <a href="/veto-dashboard" class="btn btn-secondary mt-4">Retour au tableau de bord</a>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
