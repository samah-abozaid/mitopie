<?php
namespace controllers;

use core\Mailer;

class ContactController
{
    public function index(): void
    {
        $success = false;
        $error   = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom     = trim($_POST['nom']     ?? '');
            $email   = trim($_POST['email']   ?? '');
            $message = trim($_POST['message'] ?? '');

            if ($nom && $email && $message && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $mailer = new Mailer();
                if ($mailer->sendContact($nom, $email, $message)) {
                    $success = true;
                } else {
                    $error = 'Erreur lors de l\'envoi. Veuillez réessayer ou nous appeler directement.';
                }
            } else {
                $error = 'Veuillez remplir tous les champs correctement.';
            }
        }

        render('contact/index', [
            'title'      => 'Nous trouver — Mitopie',
            'activePage' => 'trouver',
            'success'    => $success,
            'error'      => $error,
        ]);
    }
}
