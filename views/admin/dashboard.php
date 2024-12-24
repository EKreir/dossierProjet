<?php include __DIR__ . '/../template/header.php'; ?>

<?php include __DIR__ . '/../template/navbar.php'; ?>

<div class="container mt-4">
    <h1>Espace Admin</h1>
    <p>Bienvenue dans l'espace d'administration. Vous pouvez consulter les rapports des animaux et les avis sur les habitats laissés par les vétérinaires.</p>

    <!-- Section des rapports des animaux -->
    <section id="animal-reports" class="my-4">
        <h2>Rapports Animaux</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Animal</th>
                    <th>État</th>
                    <th>Nourriture</th>
                    <th>Grammage</th>
                    <th>Date</th>
                    <th>Vétérinaire</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($animalReports as $report): ?>
                    <tr>
                        <td><?= htmlspecialchars($report['animal_name']) ?></td>
                        <td><?= htmlspecialchars($report['health_status']) ?></td>
                        <td><?= htmlspecialchars($report['food_type']) ?></td>
                        <td><?= htmlspecialchars($report['food_quantity_kg']) ?> kg</td>
                        <td><?= htmlspecialchars($report['report_date']) ?></td>
                        <td><?= htmlspecialchars($report['vet_username']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <!-- Section des avis sur les habitats -->
    <section id="habitat-reviews" class="my-4">
        <h2>Avis Habitats</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Habitat</th>
                    <th>Date</th>
                    <th>Avis</th>
                    <th>Vétérinaire</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($habitatReviews as $review): ?>
                    <tr>
                        <td><?= htmlspecialchars($review['habitat_name']) ?></td>
                        <td><?= htmlspecialchars($review['review_date']) ?></td>
                        <td><?= htmlspecialchars($review['review_text']) ?></td>
                        <td><?= htmlspecialchars($review['vet_name']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
