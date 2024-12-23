<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Modifier un Service</h1>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<!-- Formulaire de modification du service -->
<form action="/edit-service" method="GET">
    <label for="service_id">Sélectionner un service à modifier :</label>
    <select name="id" id="service_id">
        <?php foreach ($services as $service) : ?>
            <option value="<?= $service['id'] ?>"><?= htmlspecialchars($service['name']) ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Modifier</button>
</form>

<a href="/list-services">Retour à la liste des services</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
