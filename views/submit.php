<?php include 'template/clientHeader.php'; ?>
<?php include 'template/clientNavbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Laissez un avis</h1>

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
    
    <form id="review-form" method="POST" action="/submit-review" class="mt-4">
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" required placeholder="Votre pseudo">
        </div>

        <div class="mb-3">
            <label class="form-label">Notation</label>
            <div id="rating" class="d-flex align-items-center">
                <input type="radio" id="star5" name="rating" value="5" required>
                <label for="star5" class="star">★</label>
                
                <input type="radio" id="star4" name="rating" value="4">
                <label for="star4" class="star">★</label>
                
                <input type="radio" id="star3" name="rating" value="3">
                <label for="star3" class="star">★</label>
                
                <input type="radio" id="star2" name="rating" value="2">
                <label for="star2" class="star">★</label>
                
                <input type="radio" id="star1" name="rating" value="1">
                <label for="star1" class="star">★</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Commentaire</label>
            <textarea class="form-control" id="comment" name="comment" rows="5" required placeholder="Écrivez votre commentaire ici..."></textarea>
        </div>

        <button type="submit" class="btn btn-success">Soumettre l'avis</button>
    </form>
</div>

<?php include 'template/clientFooter.php'; ?>
