<?php include __DIR__ . '/../template/header.php'; ?>

<h1 class="text-center my-4">Modifier un Service</h1>

<!-- Affichage des messages d'erreur et de succès -->
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

<!-- Formulaire de sélection du service à modifier -->
<div class="container">
    <form action="/edit-services" method="GET" class="mb-4">
        <div class="form-group">
            <label for="service_id">Sélectionner un service à modifier :</label>
            <select name="id" id="service_id" class="form-control" onchange="this.form.submit()">
                <option value="">Choisir un service...</option>
                <?php foreach ($services as $service) : ?>
                    <option value="<?= $service['id'] ?>" <?= isset($_GET['id']) && $_GET['id'] == $service['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($service['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </form>

    <?php if (isset($_GET['id'])): ?>
        <?php
            // Si un service a été sélectionné, afficher le formulaire d'édition
            $selectedService = null;
            foreach ($services as $service) {
                if ($service['id'] == $_GET['id']) {
                    $selectedService = $service;
                    break;
                }
            }
        ?>
        
        <?php if ($selectedService): ?>
            <!-- Formulaire de modification du service -->
            <h3 class="my-4">Modifier le Service: <?= htmlspecialchars($selectedService['name']) ?></h3>

            <form action="/edit-service-submit" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $selectedService['id'] ?>">

                <div class="form-group">
                    <label for="name">Nom du service</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($selectedService['name']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description du service</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required><?= htmlspecialchars($selectedService['description']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image du service</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    <?php if ($selectedService['image']): ?>
                        <small>Image actuelle : <img src="<?= htmlspecialchars($selectedService['image']) ?>" alt="Image du service" style="max-width: 200px; height: auto;"></small>
                    <?php endif; ?>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour le service</button>
            </form>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                Service introuvable. Veuillez essayer de sélectionner un autre service.
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>

<a href="/employee-dashboard" class="btn btn-secondary mt-4">Retour</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
