<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Liste des animaux</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<table class="table table-striped">
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
        <?php if (!empty($animals)): ?>
            <?php foreach ($animals as $animal): ?>
                <tr>
                    <td><?= htmlspecialchars($animal['name']) ?></td>
                    <td><?= htmlspecialchars($animal['breed']) ?></td>
                    <td>
                        <?php if ($animal['image']): ?>
                            <img src="<?= htmlspecialchars($animal['image']) ?>" alt="Image de l'animal" width="100">
                        <?php else: ?>
                            Pas d'image
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php
                        // Affichage du nom de l'habitat associé à l'animal
                        $habitatName = 'Inconnu';
                        if ($animal['habitat_id']) {
                            $habitatQuery = "SELECT name FROM habitats WHERE id = :habitat_id";
                            $habitatStmt = $this->conn->prepare($habitatQuery);
                            $habitatStmt->bindParam(':habitat_id', $animal['habitat_id']);
                            $habitatStmt->execute();
                            $habitat = $habitatStmt->fetch(PDO::FETCH_ASSOC);
                            if ($habitat) {
                                $habitatName = $habitat['name'];
                            }
                        }
                        echo htmlspecialchars($habitatName);
                        ?>
                    </td>
                    <td>
                        <a href="/edit-animal?id=<?= $animal['id'] ?>" class="btn btn-warning">Modifier</a>
                        <a href="/delete-animal?id=<?= $animal['id'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet animal ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Aucun animal trouvé.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<a href="/create-animal" class="btn btn-primary">Ajouter un nouvel animal</a>

<?php include __DIR__ . '/../template/footer.php'; ?>
