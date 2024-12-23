<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Créer un nouvel habitat</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<form action="/create-habitat" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nom de l'habitat</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description de l'habitat</label>
        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="images">Image de l'habitat</label>
        <input type="file" name="images" id="images" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Créer l'habitat</button>
    <a href="/list-habitats" class="btn btn-secondary">Retour à la liste des habitats</a>
</form>

<?php include __DIR__ . '/../template/footer.php'; ?>
