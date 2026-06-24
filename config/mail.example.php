<?php
// Copy this file to config/mail.php and fill in your Gmail credentials
return [
    'host'     => 'smtp.gmail.com',
    'port'     => 587,
    'username' => 'votre.adresse@gmail.com',
    'password' => 'votre_app_password_gmail',  // App Password (not your Gmail password)
    'from'     => 'votre.adresse@gmail.com',
    'from_name'=> 'Ferme Mitopie',
    'to'       => 'contact@mitopie.fr',         // Address receiving contact & reservation emails
];
