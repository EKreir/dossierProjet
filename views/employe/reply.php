<?php include __DIR__ . '/../template/header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Répondre à un email</h1>

    <!-- Affichage des messages d'erreur et succès -->
    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success mt-4" role="alert">
            <?= htmlspecialchars($successMessage) ?>
        </div>
    <?php elseif (isset($errorMessage)): ?>
        <div class="alert alert-danger mt-4" role="alert">
            <?= htmlspecialchars($errorMessage) ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire de réponse -->
    <form method="POST" action="/send-reply" class="mt-4">
        <!-- Affichage du sujet -->
        <div class="mb-3">
            <label for="subject" class="form-label">Sujet</label>
            <input type="text" class="form-control" id="subject" name="subject" value="<?= htmlspecialchars($mail['subject']) ?>" readonly>
        </div>

        <!-- Email du destinataire -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($mail['email']) ?>" readonly>
        </div>

        <!-- Message -->
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="6" required placeholder="Votre réponse ici..."></textarea>
        </div>

        <!-- Bouton envoyer -->
        <button type="submit" class="btn btn-primary">Envoyer la réponse</button>
    </form>
</div>

<?php include __DIR__ . '/../template/footer.php'; ?>
