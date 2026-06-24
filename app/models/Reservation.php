<?php
namespace models;

class Reservation
{
    public int    $id;
    public string $nom;
    public string $email;
    public ?string $telephone;
    public string $date_retrait;
    public ?string $message;
    public string $statut;
    public string $created_at;
}
