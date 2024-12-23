<?php

class LoginController {
    public function showLoginForm() {
        require_once __DIR__ . '/../views/login.php';
    }

    public function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        // Connexion à la base de données
        $database = new Database();
        $conn = $database->getConnection();

        // Vérifier si l'utilisateur existe
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // L'utilisateur est authentifié, démarrer la session
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Rediriger vers l'espace approprié selon le rôle
            if ($user['role'] === 'admin') {
                header('Location: /admin-dashboard');
            } elseif ($user['role'] === 'employee') {
                header('Location: /employee-dashboard');
            } elseif ($user['role'] === 'veterinarian') {
                header('Location: /veto-dashboard');
            } else {
                $errorMessage = "Rôle d'utilisateur non reconnu.";
                require_once __DIR__ . '/../views/login.php';
            }
            exit;
        } else {
            $errorMessage = "Nom d'utilisateur ou mot de passe incorrect.";
            // Assurer que l'erreur est passée à la vue
            require_once __DIR__ . '/../views/login.php';
        }
    }
}

}
