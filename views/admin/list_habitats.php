<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Liste des habitats</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom de l'habitat</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($habitats) && count($habitats) > 0): ?>
            <?php foreach ($habitats as $habitat): ?>
                <tr>
                    <td><?= htmlspecialchars($habitat['name']) ?></td>
                    <td><?= htmlspecialchars($habitat['description']) ?></td>
                    <td>
                        <?php if ($habitat['images']): ?>
                            <img src="<?= $habitat['images'] ?>" alt="Image de l'habitat" width="100">
                        <?php else: ?>
                            Pas d'image
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="/edit-habitat?id=<?= $habitat['id'] ?>" class="btn btn-warning">Modifier</a>
                        <a href="/delete-habitat?id=<?= $habitat['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet habitat ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Aucun habitat trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<a href="/create-habitat" class="btn btn-success">Ajouter un habitat</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
