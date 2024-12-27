<?php include __DIR__ . '/../template/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/veto-dashboard">Espace Vétérinaire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/animal-consumptions">Consommation animale</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/animal-reports">Rapports animaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/add-habitat-review">Avis des habitats</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger" href="/logout">Se déconnecter</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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

<?php include __DIR__ . '/../template/footer.php'; ?>
