<?php
namespace models;

class User
{
    public int    $id;
    public string $nom;
    public string $email;
    public string $password_hash;
    public string $role;
    public string $created_at;

    public static function fromArray(array $row): self
    {
        $u                = new self();
        $u->id            = (int) $row['id'];
        $u->nom           =       $row['nom'];
        $u->email         =       $row['email'];
        $u->password_hash =       $row['password_hash'];
        $u->role          =       $row['role']       ?? 'admin';
        $u->created_at    =       $row['created_at'] ?? '';
        return $u;
    }
}
