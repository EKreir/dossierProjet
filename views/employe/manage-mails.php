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
                <li class="nav-item">
                    <a class="nav-link" href="/manage-mails">Gérer les mails</a>
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

<div class="container mt-5">
    <h1 class="text-center">Gestion des Mails</h1>
    
    <!-- Afficher les messages d'erreur ou de succès -->
    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success" role="alert">
            <?= htmlspecialchars($_GET['success']) ?>
        </div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($_GET['error']) ?>
        </div>
    <?php endif; ?>
    
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mails as $mail): ?>
                <tr>
                    <td><?= htmlspecialchars($mail['title']) ?></td>
                    <td><?= htmlspecialchars($mail['email']) ?></td>
                    <td><?= htmlspecialchars($mail['message']) ?></td>
                    <td><?= htmlspecialchars($mail['created_at']) ?></td>
                    <td>
                        <a href="/reply?id=<?= $mail['id'] ?>" class="btn btn-primary btn-sm">Répondre</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>