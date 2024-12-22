<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Modifier les horaires d'ouverture</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<form action="/showHours" method="POST">
    <table class="table">
        <thead>
            <tr>
                <th>Jour</th>
                <th>Heure d'ouverture</th>
                <th>Heure de fermeture</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hours as $hour): ?>
                <tr>
                    <td><?= htmlspecialchars($hour['day_of_week']) ?></td>
                    <td>
                        <input type="time" name="hours[<?= $hour['id'] ?>][opening]" value="<?= $hour['opening_time'] ?>" required>
                    </td>
                    <td>
                        <input type="time" name="hours[<?= $hour['id'] ?>][closing]" value="<?= $hour['closing_time'] ?>" required>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
</form>

<?php include __DIR__ . '/../template/footer.php'; ?>
