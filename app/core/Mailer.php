<?php
namespace core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    private PHPMailer $mail;
    private array $cfg;

    public function __construct()
    {
        $this->cfg  = require ROOT . '/config/mail.php';
        $this->mail = new PHPMailer(true);

        $this->mail->isSMTP();
        $this->mail->Host       = $this->cfg['host'];
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $this->cfg['username'];
        $this->mail->Password   = $this->cfg['password'];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = $this->cfg['port'];
        $this->mail->CharSet    = 'UTF-8';

        $this->mail->setFrom($this->cfg['from'], $this->cfg['from_name']);
        $this->mail->addAddress($this->cfg['to']);
    }

    public function sendContact(string $nom, string $email, string $message): bool
    {
        try {
            $this->mail->addReplyTo($email, $nom);
            $this->mail->Subject = "Message de contact — $nom";
            $this->mail->isHTML(true);
            $this->mail->Body = "
                <h3>Nouveau message de contact</h3>
                <p><strong>Nom :</strong> " . htmlspecialchars($nom) . "</p>
                <p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
                <p><strong>Message :</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
            ";
            $this->mail->AltBody = "Nom: $nom\nEmail: $email\nMessage:\n$message";
            $this->mail->send();
            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function sendReservation(array $data): bool
    {
        try {
            $this->mail->addReplyTo($data['email'], $data['nom']);
            $this->mail->Subject = "Nouvelle réservation — " . $data['nom'];
            $this->mail->isHTML(true);
            $this->mail->Body = "
                <h3>Nouvelle demande de réservation</h3>
                <p><strong>Nom :</strong> " . htmlspecialchars($data['nom']) . "</p>
                <p><strong>Email :</strong> " . htmlspecialchars($data['email']) . "</p>
                <p><strong>Téléphone :</strong> " . htmlspecialchars($data['telephone'] ?? '—') . "</p>
                <p><strong>Date de retrait souhaitée :</strong> " . htmlspecialchars($data['date_retrait']) . "</p>
                <p><strong>Produits / message :</strong><br>" . nl2br(htmlspecialchars($data['message'] ?? '')) . "</p>
            ";
            $this->mail->AltBody = "Réservation de {$data['nom']} ({$data['email']}) pour le {$data['date_retrait']}";
            $this->mail->send();
            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function sendReservationConfirmation(array $data): bool
    {
        try {
            $confirm = new PHPMailer(true);
            $confirm->isSMTP();
            $confirm->Host       = $this->cfg['host'];
            $confirm->SMTPAuth   = true;
            $confirm->Username   = $this->cfg['username'];
            $confirm->Password   = $this->cfg['password'];
            $confirm->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $confirm->Port       = $this->cfg['port'];
            $confirm->CharSet    = 'UTF-8';
            $confirm->setFrom($this->cfg['from'], $this->cfg['from_name']);
            $confirm->addAddress($data['email'], $data['nom']);
            $confirm->Subject = 'Votre réservation Mitopie est confirmée !';
            $confirm->isHTML(true);
            $confirm->Body = "
                <h3>Bonjour " . htmlspecialchars($data['nom']) . ",</h3>
                <p>Votre réservation à la ferme Mitopie a bien été <strong>confirmée</strong>.</p>
                <p><strong>Date de retrait :</strong> " . htmlspecialchars($data['date_retrait']) . "</p>
                <p>Nous vous attendons au <strong>Le Moulin de Favières, 53120 Brecé</strong>.</p>
                <p>— L'équipe Mitopie</p>
            ";
            $confirm->AltBody = "Bonjour {$data['nom']}, votre réservation est confirmée pour le {$data['date_retrait']}.";
            $confirm->send();
            return true;
        } catch (Exception) {
            return false;
        }
    }
}
