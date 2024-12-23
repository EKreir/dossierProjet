<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Créer un animal</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Prénom</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="breed">Race</label>
        <input type="text" id="breed" name="breed" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="habitat_id">Habitat</label>
        <select id="habitat_id" name="habitat_id" class="form-control" required>
            <option value="">Sélectionner un habitat</option>
            <?php foreach ($habitats as $habitat): ?>
                <option value="<?= $habitat['id'] ?>"><?= $habitat['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Créer l'animal</button>
</form>

<a href="/list-animals" class="btn btn-secondary">Retour à la liste des animaux</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
