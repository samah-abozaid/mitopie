<?php
namespace controllers;

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
                // TODO: send email with mail() or a library
                $success = true;
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
