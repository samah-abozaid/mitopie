<?php
namespace controllers;

use core\Mailer;
use managers\ReservationManager;

class ReservationController
{
    public function index(): void
    {
        $success = false;
        $error   = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom          = trim($_POST['nom']          ?? '');
            $email        = trim($_POST['email']        ?? '');
            $telephone    = trim($_POST['telephone']    ?? '');
            $date_retrait = trim($_POST['date_retrait'] ?? '');
            $message      = trim($_POST['message']      ?? '');

            if ($nom && $email && $date_retrait && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $data = compact('nom', 'email', 'telephone', 'date_retrait', 'message');

                $manager = new ReservationManager();
                $manager->insert($data);

                $mailer = new Mailer();
                $mailer->sendReservation($data);

                $success = true;
            } else {
                $error = 'Veuillez remplir les champs obligatoires (nom, email, date de retrait).';
            }
        }

        render('reservation/index', [
            'title'      => 'Réserver — Mitopie',
            'activePage' => 'reservation',
            'success'    => $success,
            'error'      => $error,
        ]);
    }
}
