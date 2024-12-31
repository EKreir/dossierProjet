<?php include 'template/clientHeader.php'; ?>
<?php include 'template/clientNavbar.php'; ?>

<div class="container mt-5">
    <?php if ($animal): ?>
        <!-- Nom de l'animal centré -->
        <h1 class="text-center my-4"><?= htmlspecialchars($animal['name']) ?></h1>

        <!-- Section détails de l'animal -->
        <div class="animal-details">
            <!-- Image de l'animal -->
            <div class="animal-image text-center">
                <img src="<?= htmlspecialchars($animal['image']) ?>"
                    alt="animal <?= htmlspecialchars($animal['name']) ?>"
                    class="img-fluid rounded shadow">
            </div>

            <!-- Infos et rapport -->
            <div class="animal-info">
                <!-- Informations -->
                <h2 class="text-success">Informations</h2>
                <ul class="list-group mb-4">
                    <li class="list-group-item"><strong>Race :</strong> <?= htmlspecialchars($animal['breed']) ?></li>
                    <li class="list-group-item"><strong>Habitat :</strong> <?= htmlspecialchars($animal['habitat_name']) ?></li>
                </ul>

                <!-- Rapport vétérinaire -->
                <?php if ($report): ?>
                    <h2 class="text-success">Rapport du vétérinaire</h2>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>État de santé :</strong> <?= htmlspecialchars($report['health_status']) ?></li>
                        <li class="list-group-item"><strong>Nourriture :</strong> <?= htmlspecialchars($report['food_type']) ?></li>
                        <li class="list-group-item"><strong>Grammage :</strong> <?= htmlspecialchars($report['food_quantity_kg']) ?> kg</li>
                        <li class="list-group-item"><strong>Date de passage :</strong> <?= htmlspecialchars($report['report_date']) ?></li>
                    </ul>
                <?php else: ?>
                    <p class="text-muted">Aucun rapport vétérinaire disponible pour cet animal.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php else: ?>
        <p class="text-danger text-center">Animal introuvable.</p>
    <?php endif; ?>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'template/clientFooter.php'; ?>
