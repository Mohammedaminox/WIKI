<?php
// CategoryModel.php
namespace App\Models;
use PDO;

class CategoryModel {
    private static $db;

    public static function setDB(PDO $db) {
        self::$db = $db;
    }

    public static function getAllCategories() {
        $query = self::$db->prepare('SELECT * FROM categories');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
