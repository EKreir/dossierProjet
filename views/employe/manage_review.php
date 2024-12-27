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

<div class="container mt-4">
    <h1 class="text-center my-4">Gérer les Avis</h1>
    <p>Liste des avis en attente de validation :</p>

    <?php if (!empty($reviews)): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pseudo</th>
                    <th>Note</th>
                    <th>Commentaire</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td><?= htmlspecialchars($review['id']) ?></td>
                        <td><?= htmlspecialchars($review['pseudo']) ?></td>
                        <td><?= htmlspecialchars($review['rating']) ?> / 5</td>
                        <td><?= htmlspecialchars($review['comment']) ?></td>
                        <td><?= htmlspecialchars($review['created_at']) ?></td>
                        <td>
                            <form action="/update-review" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($review['id']) ?>">
                                <button type="submit" name="status" value="approved" class="btn btn-success btn-sm">Approuver</button>
                            </form>
                            <form action="/update-review" method="POST" class="d-inline">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($review['id']) ?>">
                                <button type="submit" name="status" value="rejected" class="btn btn-danger btn-sm">Rejeter</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">Aucun avis en attente.</p>
    <?php endif; ?>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
