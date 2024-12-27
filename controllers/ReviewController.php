<?php

require_once __DIR__ . '/../models/ReviewModel.php';

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
                    header('Location: /notice?success=true');
                    exit;
                }
            }
            header('Location: /notice?error=true');
            exit;
        }
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
