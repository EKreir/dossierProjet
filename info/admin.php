<?php
// Inclure la connexion à la base de données et le modèle User
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $role = 'admin'; // Rôle défini comme 'admin'

    // Vérifier que les champs sont remplis
    if (empty($username) || empty($password)) {
        $errorMessage = "Tous les champs sont obligatoires.";
    } else {
        // Créer un objet User et insérer l'admin dans la base de données
        $userModel = new User();
        $success = $userModel->create($username, $password, $role);

        if ($success) {
            $successMessage = "Compte admin créé avec succès.";
        } else {
            $errorMessage = "Une erreur est survenue lors de la création du compte admin.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Création de compte Admin</title>
</head>
<body>
    <h1>Créer un compte admin</h1>

    <?php if (isset($errorMessage)): ?>
        <p style="color: red;"><?= htmlspecialchars($errorMessage) ?></p>
    <?php endif; ?>

    <?php if (isset($successMessage)): ?>
        <p style="color: green;"><?= htmlspecialchars($successMessage) ?></p>
    <?php endif; ?>

    <!-- Formulaire de création du compte admin -->
    <form action="admin.php" method="POST">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" required>
        <br>

        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
        <br>

        <button type="submit">Créer le compte</button>
    </form>
</body>
</html>
