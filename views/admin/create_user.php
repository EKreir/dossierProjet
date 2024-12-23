<?php include __DIR__ . '/../template/header.php'; ?>

<?php include __DIR__ . '/../template/navbar.php'; ?>

<h1>Créer un utilisateur</h1>

<?php if (isset($successMessage)): ?>
    <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
<?php endif; ?>

<?php if (isset($errorMessage)): ?>
    <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
<?php endif; ?>

<form action="/create-user-submit" method="POST">
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="role">Rôle</label>
        <select name="role" id="role" class="form-control" required>
            <option value="veterinarian">Vétérinaire</option>
            <option value="employee">Employé</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-success">Créer l'utilisateur</button>
</form>


<?php include __DIR__ . '/../template/footer.php'; ?>
