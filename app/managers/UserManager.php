<?php
namespace managers;

use core\Database;
use models\User;

class UserManager
{
    private \PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    /** Find a user by email */
    public function getByEmail(string $email): ?User
    {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row ? User::fromArray($row) : null;
    }

    /**
     * Verify credentials and return the User on success, null on failure.
     * Uses PHP's password_verify() for safe bcrypt comparison.
     */
    public function authenticate(string $email, string $password): ?User
    {
        $user = $this->getByEmail($email);
        if ($user && password_verify($password, $user->password_hash)) {
            return $user;
        }
        return null;
    }
}
