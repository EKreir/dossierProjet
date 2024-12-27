<?php include __DIR__ . '/../template/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="/employee-dashboard">Espace Employé</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/edit-services">Modifier les services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/add-feeding">Consommation quotidienne</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/manage-reviews">Gérer les avis</a>
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

<h1 class="text-center my-4">Enregistrer l'alimentation d'un animal</h1>

<?php if (isset($errorMessage)): ?>
    <div class="alert alert-danger" role="alert">
        <?= htmlspecialchars($errorMessage) ?>
    </div>
<?php endif; ?>

<?php if (isset($successMessage)): ?>
    <div class="alert alert-success" role="alert">
        <?= htmlspecialchars($successMessage) ?>
    </div>
<?php endif; ?>

<div class="container">
    <form action="/add-feeding" method="POST">
        <div class="form-group">
            <label for="animal_id">Animal</label>
            <select name="animal_id" id="animal_id" class="form-control" required>
                <option value="">Choisir un animal...</option>
                <?php foreach ($animals as $animal): ?>
                    <option value="<?= $animal['id'] ?>"><?= htmlspecialchars($animal['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="feed_date">Date</label>
            <input type="date" name="feed_date" id="feed_date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="feed_time">Heure</label>
            <input type="time" name="feed_time" id="feed_time" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="food_type">Type de nourriture</label>
            <input type="text" name="food_type" id="food_type" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="quantity_kg">Quantité (kg)</label>
            <input type="number" name="quantity_kg" id="quantity_kg" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
