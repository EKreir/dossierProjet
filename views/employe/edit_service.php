<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Modifier le service</h1>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<!-- Formulaire de modification du service -->
<form action="/edit-service?id=<?= $service['id'] ?>" method="POST" enctype="multipart/form-data">
    <label for="name">Nom du service :</label>
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($service['name']) ?>" required>
    <br>

    <label for="description">Description :</label>
    <textarea name="description" id="description" required><?= htmlspecialchars($service['description']) ?></textarea>
    <br>

    <label for="image">Image :</label>
    <input type="file" name="image" id="image" accept="image/*">
    <br>

    <button type="submit">Modifier le service</button>
</form>

<a href="/list-services">Retour à la liste des services</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
