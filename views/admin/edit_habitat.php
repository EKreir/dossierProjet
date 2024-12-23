<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Modifier l'habitat</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<?php if (isset($habitat)): ?>
    <form action="/edit-habitat?id=<?= $habitat['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nom de l'habitat</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($habitat['name']) ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Description de l'habitat</label>
            <textarea name="description" id="description" class="form-control" rows="4" required><?= htmlspecialchars($habitat['description']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="images">Image de l'habitat</label>
            <input type="file" name="images" id="images" class="form-control">
            <?php if ($habitat['image']): ?>
                <p>Image actuelle : <img src="<?= $habitat['image'] ?>" alt="Image de l'habitat" width="100"></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour l'habitat</button>
        <a href="/list-habitats" class="btn btn-secondary">Retour à la liste des habitats</a>
    </form>
<?php else: ?>
    <p>L'habitat demandé est introuvable.</p>
<?php endif; ?>

<?php include __DIR__ . '/../template/footer.php'; ?>
