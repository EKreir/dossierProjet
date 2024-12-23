<?php include __DIR__ . '/../template/header.php'; ?>

<h1 class="text-center my-4">Créer un service</h1>

<?php if (isset($errorMessage)): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($errorMessage) ?>
    </div>
<?php endif; ?>

<?php if (isset($successMessage)): ?>
    <div class="alert alert-success">
        <?= htmlspecialchars($successMessage) ?>
    </div>
<?php endif; ?>

<!-- Formulaire de création de service -->
<form action="/create-service" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name" class="form-label">Nom du service :</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description" class="form-label">Description :</label>
        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="image" class="form-label">Image :</label>
        <input type="file" name="image" id="image" class="form-control" accept="image/*">
    </div>
        <button type="submit" class="btn btn-success">Créer le service</button>
        <a href="/list-services" class="btn btn-secondary">Retour à la liste des services</a>
</form>

<?php include __DIR__ . '/../template/footer.php'; ?>
