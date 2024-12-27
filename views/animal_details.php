<?php include 'template/clientHeader.php'; ?>
<?php include 'template/clientNavbar.php'; ?>

<div class="container mt-5">
    <?php if ($animal): ?>
        <h1 class="text-center my-4"><?= htmlspecialchars($animal['name']) ?></h1>
        <div class="row">
            <div class="col-md-6">
                <img src="<?= htmlspecialchars($animal['image']) ?>" alt="Image de <?= htmlspecialchars($animal['name']) ?>" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h2>Informations</h2>
                <ul>
                    <li><strong>Race :</strong> <?= htmlspecialchars($animal['breed']) ?></li>
                    <li><strong>Habitat :</strong> <?= htmlspecialchars($animal['habitat_name']) ?></li>
                </ul>

                <?php if ($report): ?>
                    <h2>Rapport du vétérinaire</h2>
                    <ul>
                        <li><strong>État de santé :</strong> <?= htmlspecialchars($report['health_status']) ?></li>
                        <li><strong>Nourriture :</strong> <?= htmlspecialchars($report['food_type']) ?></li>
                        <li><strong>Grammage :</strong> <?= htmlspecialchars($report['food_quantity_kg']) ?> kg</li>
                        <li><strong>Date de passage :</strong> <?= htmlspecialchars($report['report_date']) ?></li>
                    </ul>
                <?php else: ?>
                    <p class="text-muted">Aucun rapport vétérinaire disponible pour cet animal.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-danger">Animal introuvable.</p>
    <?php endif; ?>
</div>

<?php include 'template/clientFooter.php'; ?>
