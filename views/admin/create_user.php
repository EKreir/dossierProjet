<?php include __DIR__ . '/../template/header.php'; ?>

<h1>Créer un utilisateur</h1>
<form action="/create-user-submit" method="POST">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <label for="role">Rôle :</label>
    <select id="role" name="role" required>
        <option value="veterinarian">Vétérinaire</option>
        <option value="employee">Employé</option>
    </select>

    <button type="submit">Créer</button>
</form>

<?php include __DIR__ . '/../template/footer.php'; ?>
