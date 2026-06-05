<?php
namespace managers;

use core\Database;
use models\Category;

class CategoryManager
{
    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /** All categories ordered by display order */
    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM categories ORDER BY ordre, nom');
        return array_map([Category::class, 'fromArray'], $stmt->fetchAll());
    }

    /** Single category by id */
    public function getById(int $id): ?Category
    {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ? Category::fromArray($row) : null;
    }

    /** Count all categories (for dashboard stats) */
    public function count(): int
    {
        return (int) $this->db->query('SELECT COUNT(*) FROM categories')->fetchColumn();
    }
}
