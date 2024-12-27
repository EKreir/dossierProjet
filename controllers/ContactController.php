<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $this->contactModel = new Contact();
    }

    public function submitContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title']);
            $email = trim($_POST['email']);
            $message = trim($_POST['message']);

            if (empty($title) || empty($email) || empty($message)) {
                $errorMessage = "Tous les champs sont obligatoires.";
                require_once __DIR__ . '/../views/contact.php';
                return;
            }

            $success = $this->contactModel->create($title, $email, $message);

            if ($success) {
                // Envoi d'un email de confirmation
                $mailSent = $this->sendConfirmationEmail($email, $title, $message);

                    $successMessage = "Votre message a été envoyé avec succès.";
            } else {
                $errorMessage = "Une erreur est survenue lors de l'envoi du message.";
            }

            require_once __DIR__ . '/../views/contact.php';
        } else {
            require_once __DIR__ . '/../views/contact.php';
        }
    }

    private function sendConfirmationEmail($to, $title, $message) {
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'localhost'; // Mailpit
            $mail->Port = 1025;        // Port de Mailpit
            $mail->SMTPAuth = false;  // Pas d'authentification pour Mailpit

            // Expéditeur et destinataire
            $mail->setFrom('noreply@yourdomain.com', 'Votre Entreprise');
            $mail->addAddress($to);

            // Contenu de l'email
            $mail->isHTML(true);
            $mail->Subject = "Confirmation de votre message : $title";
            $mail->Body = "<p>Merci pour votre message :</p><p><strong>$message</strong></p><p>Nous vous répondrons dans les plus brefs délais.</p>";

            $mail->send();
            return true;
        } catch (Exception $e) {
            // Vous pouvez logger l'erreur ici pour déboguer
            error_log("Erreur lors de l'envoi de l'email : " . $mail->ErrorInfo);
            return false;
        }
    }

    // Afficher la page de réponse
    public function reply($id) {
    $mail = $this->contactModel->getMailById($id); // Récupérer le mail via l'ID

    if (!$mail) {
        header('Location: /manage-mails?error=mail_not_found');
        exit;
    }

    require_once __DIR__ . '/../views/employe/reply.php'; // Charger la vue de réponse
}

    // Envoyer la réponse
    public function sendReply() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int)$_POST['id'];
            $email = trim($_POST['email']);
            $subject = trim($_POST['subject']);
            $message = trim($_POST['message']);

            if (!empty($email) && !empty($subject) && !empty($message)) {
                // Envoyer l'email avec PHPMailer
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host = 'localhost';
                    $mail->Port = 1025;
                    $mail->SMTPAuth = false;

                    $mail->setFrom('support@votreprojet.com', 'Support');
                    $mail->addAddress($email);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = $message;

                    $mail->send();

                    header('Location: /manage-mails?success=envoi réussi');
                    exit;
                } catch (Exception $e) {
                    error_log("Erreur lors de l'envoi : " . $mail->ErrorInfo);
                    header('Location: /reply?id=' . $id . '&error=mail_failed');
                    exit;
                }
            } else {
                header('Location: /reply?id=' . $id . '&error=fields_required');
                exit;
            }
        }
    }


    public function manageMails() {
        $mails = $this->contactModel->getAllMails(); // Récupérer tous les mails
        require_once __DIR__ . '/../views/employe/manage-mails.php'; // Charger la vue
    }

}
