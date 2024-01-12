<?php

namespace App\Models;

use Config\DbConnection;
use PDO;
use PDOException;


class CategoryModel extends Crud {
    // private $db;

    // public function __construct() {
    //     $this->db = DbConnection::getConnection();

    // }

    public function getAllCategories() {
        // $query = $this->db->prepare('SELECT * FROM categories');
        // $query->execute();
        // return $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->read('categories');
    }

    public function getCategoryById($id) {
               return $this->getRecordById('categories',$id);
            }
            
            
            
    public function createCategory($data) {
                
         $this->create('categories',$data);
       
    }

    public function updateCategory($data, $id) {
        $this->update('categories', $data, $id);
        
    }
    public function deleteCategory($id) {
        $this->delete('categories', $id);
    }
}



?>

