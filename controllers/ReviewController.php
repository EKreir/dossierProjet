<?php

class ReviewController {
    private $reviewModel;

    public function __construct() {
        $this->reviewModel = new ReviewModel();
    }

    public function submitReview() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = trim($_POST['pseudo']);
            $rating = (int)$_POST['rating'];
            $comment = trim($_POST['comment']);

            if (!empty($pseudo) && !empty($rating) && !empty($comment)) {
                $success = $this->reviewModel->addReview($pseudo, $rating, $comment);

                if ($success) {
                    $successMessage = "Votre avis a été soumis avec succès.";
                } else {
                    $errorMessage = "Une erreur est survenue lors de la soumission de votre avis.";
                }
            } else {
                $errorMessage = "Tous les champs sont obligatoires.";
            }

            require_once __DIR__ . '/../views/submit.php';
            return;
        }

        // Si la requête n'est pas POST, afficher simplement la page de soumission
        require_once __DIR__ . '/../views/submit.php';
    }

    public function manageReviews() {
        $reviews = $this->reviewModel->getPendingReviews();
        require_once __DIR__ . '/../views/employe/manage_review.php';
    }

    public function updateReview() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int)$_POST['id'];
        $status = $_POST['status'];

        if (!empty($id) && in_array($status, ['approved', 'rejected'])) {
            $this->reviewModel->updateReviewStatus($id, $status);
        }
        header('Location: /manage-reviews');
        exit;
    }
}

}
