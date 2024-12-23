<!-- Dans le fichier list_animals.php -->
<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Liste des animaux</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<!-- Affichage des animaux -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Prénom</th>
            <th>Race</th>
            <th>Image</th>
            <th>Habitat</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($animals as $animal): ?>
            <tr>
                <td><?= htmlspecialchars($animal['name']) ?></td>
                <td><?= htmlspecialchars($animal['breed']) ?></td>
                <td><img src="<?= htmlspecialchars($animal['image']) ?>" alt="Image de <?= htmlspecialchars($animal['name']) ?>" width="100"></td>
                <td><?= htmlspecialchars($animal['habitat']) ?></td> <!-- Affiche l'habitat associé -->
                <td>
                    <a href="/edit-animal?id=<?= $animal['id'] ?>" class="btn btn-warning">Modifier</a>
                    <a href="/delete-animal?id=<?= $animal['id'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="/create-animal" class="btn btn-success">Créer un nouvel animal</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
