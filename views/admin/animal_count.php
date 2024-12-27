<?php include __DIR__ . '/../template/header.php'; ?>

<?php include __DIR__ . '/../template/navbar.php'; ?>

<h1>Consultation des Animaux</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th>Nom de l'animal</th>
            <th>Race</th>
            <th>Habitat</th>
            <th>Nombre de Consultations</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animals as $animal): ?>
            <tr>
                <td><?= htmlspecialchars($animal['name']) ?></td>
                <td><?= htmlspecialchars($animal['breed']) ?></td>
                <td><?= htmlspecialchars($animal['habitat']) ?></td>
                <td><?= htmlspecialchars($animal['views_count']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include __DIR__ . '/../template/footer.php'; ?>
