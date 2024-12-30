<?php include 'template/clientHeader.php'; ?>
<?php include 'template/clientNavbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center my-4">Nos Habitats</h1>
    <div class="row">
       <?php foreach ($habitats as $habitat): ?>
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            <img class="card-img-top" src="<?= htmlspecialchars($habitat['images']) ?>" alt="Image de <?= htmlspecialchars($habitat['name']) ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h2 class="card-title"><?= htmlspecialchars($habitat['name']) ?></h2>
                <p class="card-text"><?= htmlspecialchars($habitat['description']) ?></p>
                
                <!-- Liste des animaux -->
                <?php if (!empty($habitat['animals'])): ?>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($habitat['animals'] as $animal): ?>
                            <li class="list-group-item">
                                <a class="animals" href="/animal?id=<?= htmlspecialchars($animal['id']) ?>"><strong><?= htmlspecialchars($animal['name']) ?></strong> (<?= htmlspecialchars($animal['breed']) ?>)
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p class="text-muted mt-3">Aucun animal dans cet habitat.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    </div>
</div>

<?php include 'template/clientFooter.php'; ?>
