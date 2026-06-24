<?php
namespace managers;

use core\Database;
use models\Reservation;
use PDO;

class ReservationManager
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function insert(array $data): int
    {
        $stmt = $this->db->prepare('
            INSERT INTO reservations (nom, email, telephone, date_retrait, message)
            VALUES (:nom, :email, :telephone, :date_retrait, :message)
        ');
        $stmt->execute([
            ':nom'          => $data['nom'],
            ':email'        => $data['email'],
            ':telephone'    => $data['telephone'] ?: null,
            ':date_retrait' => $data['date_retrait'],
            ':message'      => $data['message'] ?: null,
        ]);
        return (int) $this->db->lastInsertId();
    }

    public function getAll(): array
    {
        return $this->db->query('
            SELECT * FROM reservations ORDER BY created_at DESC
        ')->fetchAll(PDO::FETCH_CLASS, Reservation::class);
    }

    public function getById(int $id): ?Reservation
    {
        $stmt = $this->db->prepare('SELECT * FROM reservations WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetchObject(Reservation::class);
        return $result ?: null;
    }

    public function updateStatut(int $id, string $statut): void
    {
        $stmt = $this->db->prepare('UPDATE reservations SET statut = :statut WHERE id = :id');
        $stmt->execute([':statut' => $statut, ':id' => $id]);
    }

    public function delete(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM reservations WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }

    public function countByStatut(string $statut): int
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM reservations WHERE statut = :statut');
        $stmt->execute([':statut' => $statut]);
        return (int) $stmt->fetchColumn();
    }
}
