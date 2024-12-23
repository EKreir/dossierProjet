<?php include 'template/header.php'; ?>

<h1 class="text-center my-4">Connexion</h1>

<?php if (isset($errorMessage)): ?>
    <div class="alert alert-danger">
        <?= htmlspecialchars($errorMessage) ?>
    </div>
<?php endif; ?>

<form action="/login-submit" method="POST" class="container w-50">
    <div class="mb-3">
        <label for="username" class="form-label">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe :</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </div>
</form>

<?php include 'template/footer.php'; ?>
