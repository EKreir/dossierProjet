<?php

class Router {
    private $routes = [];

    // Ajouter une route
    public function add($path, $callback) {
        $this->routes[$path] = $callback;
    }

    // Lancer le routeur
    public function dispatch($requestedPath) {
        if (isset($this->routes[$requestedPath])) {
            call_user_func($this->routes[$requestedPath]);
        } else {
            http_response_code(404);
            echo "Erreur 404 : Page non trouvée.";
        }
    }
}
