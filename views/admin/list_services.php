<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Liste des services</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<!-- Affichage des services -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><?= htmlspecialchars($service['name']) ?></td>
                <td><?= htmlspecialchars($service['description']) ?></td>
                <td><img src="<?= htmlspecialchars($service['image']) ?>" alt="Image de <?= htmlspecialchars($service['name']) ?>" width="100"></td>
                <td>
                    <a href="/delete-service?id=<?= $service['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/create-service" class="btn btn-success">Créer un nouveau service</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
