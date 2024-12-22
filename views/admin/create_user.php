<?php require_once __DIR__ . '/../templates/header.php'; ?>

<h1>Créer un utilisateur</h1>
<form action="/public/index.php?action=createUser" method="POST">
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

<?php require_once __DIR__ . '/../templates/footer.php'; ?>
