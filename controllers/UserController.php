<?php

class UserController {
    public function createUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? '';

            if (!empty($username) && !empty($password) && !empty($role)) {
                $user = new User();
                if ($user->create($username, $password, $role)) {
                    header("Location: /success");
                    exit();
                } else {
                    echo "Erreur : Impossible de créer l'utilisateur.";
                }
            } else {
                echo "Erreur : Tous les champs sont requis.";
            }
        }
    }
}
