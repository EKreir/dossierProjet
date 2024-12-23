<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Admin</title>
    <link rel="stylesheet" href="/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>Création administration</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Zoo Management</a>
  <div class="collapse navbar-collapse">
    <ul class="navbar-nav ml-auto">
      <?php if (isset($_SESSION['role'])): ?>
          <?php if ($_SESSION['role'] === 'admin'): ?>
              <li class="nav-item"><a class="nav-link" href="/admin-dashboard">Espace Admin</a></li>
              <li class="nav-item"><a class="nav-link" href="/logout">Déconnexion</a></li>
          <?php elseif ($_SESSION['role'] === 'employee'): ?>
              <li class="nav-item"><a class="nav-link" href="/employee-dashboard">Espace Employé</a></li>
              <li class="nav-item"><a class="nav-link" href="/logout">Déconnexion</a></li>
          <?php else: ?>
              <li class="nav-item"><a class="nav-link" href="/logout">Déconnexion</a></li>
          <?php endif; ?>
      <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="/login">Se connecter</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

    <main>
