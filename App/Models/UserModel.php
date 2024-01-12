<?php

namespace App\Models;

use Config\DbConnection;
use PDO;
use PDOException;


class UserModel
{
    private $conn;
    public function __construct() {
        $this->conn = DbConnection::getConnection();

    }

    public function getAllUsers() {
        $query = "SELECT * FROM users WHERE role = 'auteur'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}