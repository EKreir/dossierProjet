<?php include __DIR__ . '/../template/header.php'; ?>

<div class="container mt-4">
    <h1>Donner un avis sur un habitat</h1>

    <?php if ($errorMessage): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($errorMessage) ?></div>
    <?php endif; ?>

    <?php if ($successMessage): ?>
        <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
    <?php endif; ?>

    <form action="/add-habitat-review" method="POST">
        <div class="form-group">
            <label for="habitat_id">Sélectionner un habitat</label>
            <select name="habitat_id" id="habitat_id" class="form-control" required>
                <?php foreach ($habitats as $habitat): ?>
                    <option value="<?= htmlspecialchars($habitat['id']) ?>"><?= htmlspecialchars($habitat['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="review_date">Date de l'avis</label>
            <input type="date" name="review_date" id="review_date" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label for="review_text">Votre avis</label>
            <textarea name="review_text" id="review_text" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Enregistrer l'avis</button>
    </form>
</div>

<a href="/veto-dashboard" class="btn btn-secondary mt-4">Retour au tableau de bord</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
