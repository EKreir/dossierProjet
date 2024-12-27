<?php include 'template/clientHeader.php'; ?>
<?php include 'template/clientNavbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Contactez-nous</h1>

    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success mt-4" role="alert">
            <?= htmlspecialchars($successMessage) ?>
        </div>
    <?php elseif (isset($errorMessage)): ?>
        <div class="alert alert-danger mt-4" role="alert">
            <?= htmlspecialchars($errorMessage) ?>
        </div>
    <?php endif; ?>
    
    <form id="contact-form" method="POST" action="/contact" class="mt-4">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required placeholder="Titre de votre message">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="Votre adresse e-mail">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Votre message ici..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php include 'template/clientFooter.php'; ?>
