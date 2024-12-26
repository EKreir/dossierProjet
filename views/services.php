<?php include 'template/clientHeader.php'; ?>

<?php include 'template/clientNavbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center my-4">Nos Services</h1>
    <div class="row">
        <?php foreach ($services as $service): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if ($service['image']): ?>
                        <img src="<?= $service['image'] ?>" class="card-img-top" alt="<?= $service['name'] ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($service['name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($service['description']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'template/clientFooter.php'; ?>