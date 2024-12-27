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

<h1 class="text-center my-4">Ajouter un Rapport</h1>

<div class="container">
    <form action="/add-animal-report" method="POST">
        <div class="form-group">
            <label for="animal_id">Animal</label>
            <select name="animal_id" id="animal_id" class="form-control" required>
                <?php foreach ($animals as $animal): ?>
                    <option value="<?= $animal['id'] ?>"><?= htmlspecialchars($animal['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="report_date">Date</label>
            <input type="date" name="report_date" id="report_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="health_status">État de santé</label>
            <input type="text" name="health_status" id="health_status" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="food_type">Type de nourriture</label>
            <input type="text" name="food_type" id="food_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="food_quantity_kg">Quantité (kg)</label>
            <input type="number" step="0.01" name="food_quantity_kg" id="food_quantity_kg" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter le rapport</button>
    </form>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
