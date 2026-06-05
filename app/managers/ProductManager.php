<?php
namespace managers;

use core\Database;
use models\Product;

class ProductManager
{
    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /** All visible products ordered by category then name */
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT * FROM products WHERE visible = 1 ORDER BY categorie_id, nom'
        );
        return array_map([Product::class, 'fromArray'], $stmt->fetchAll());
    }

    /** Products for one category */
    public function getByCategory(int $categoryId): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM products WHERE visible = 1 AND categorie_id = ? ORDER BY nom'
        );
        $stmt->execute([$categoryId]);
        return array_map([Product::class, 'fromArray'], $stmt->fetchAll());
    }

    /** Featured products for the home page (available ones first) */
    public function getFeatured(int $limit = 4): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM products WHERE visible = 1
             ORDER BY (disponibilite = 'disponible') DESC, id ASC
             LIMIT ?"
        );
        $stmt->bindValue(1, $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return array_map([Product::class, 'fromArray'], $stmt->fetchAll());
    }

    /** Single product by id */
    public function getById(int $id): ?Product
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ? Product::fromArray($row) : null;
    }

    /** Create a new product; returns the new id */
    public function insert(array $data): int
    {
        $stmt = $this->db->prepare(
            'INSERT INTO products
             (nom, description, prix, unite, categorie_id, image, saison, disponibilite, visible)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $stmt->execute([
            $data['nom'],
            $data['description']  ?? '',
            $data['prix'],
            $data['unite']        ?? 'pièce',
            $data['categorie_id'],
            $data['image']        ?? 'default.jpg',
            $data['saison']       ?? 'Toute saison',
            $data['disponibilite'] ?? 'disponible',
            isset($data['visible']) ? 1 : 0,
        ]);
        return (int) $this->db->lastInsertId();
    }

    /** Update an existing product */
    public function update(int $id, array $data): void
    {
        $stmt = $this->db->prepare(
            'UPDATE products SET
             nom=?, description=?, prix=?, unite=?, categorie_id=?,
             image=?, saison=?, disponibilite=?, visible=?
             WHERE id=?'
        );
        $stmt->execute([
            $data['nom'],
            $data['description']   ?? '',
            $data['prix'],
            $data['unite']         ?? 'pièce',
            $data['categorie_id'],
            $data['image']         ?? 'default.jpg',
            $data['saison']        ?? 'Toute saison',
            $data['disponibilite'] ?? 'disponible',
            isset($data['visible']) ? 1 : 0,
            $id,
        ]);
    }

    /** Delete a product */
    public function delete(int $id): void
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = ?');
        $stmt->execute([$id]);
    }

    /** Count all products (for dashboard stats) */
    public function count(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM products')->fetchColumn();
    }
}
