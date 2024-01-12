<?php
namespace App\Models;
use Config\DbConnection;
use Dotenv\Parser\Value;
use PDO;
use PDOException;
class Crud {
    public $conn;
    public function __construct(){
        $this->conn = DbConnection::getConnection();
        
    }
    public function create($tableName, $data)
    {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $query = "INSERT INTO $tableName ($columns) VALUES ($values)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute($data);
            echo "Record added successfully!";
        } catch (PDOException $e) {
            echo "Error creating record: " . $e->getMessage();
        }
    }
    public function read($tableName){
        try{
            $query = "SELECT * FROM `$tableName`";
            $stmt = $this->conn->query($query);
            $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e){
            echo "error read record" . $e->getMessage();
            return [];
        }
    }
    public function update($tableName, $data, $id)
    {
        try {
            $update_arr = [];
            foreach ($data as $column => $value) {
                $update_arr[] = "$column = :$column";
            }
            $update_arr = implode(", ", $update_arr);

            $query = "UPDATE $tableName SET $update_arr WHERE id = :id";
            $data['id'] = $id;

            $stmt = $this->conn->prepare($query);
            $stmt->execute($data);

            echo "Record updated successfully!";
        } catch (PDOException $e) {
            echo "Error updating record: " . $e->getMessage();
        }
    }
    public function delete($tableName, $id){
        try{
            $query = "DELETE FROM `$tableName` WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id , PDO::PARAM_INT);
            $stmt->execute();
            echo 'record delete successfully';
        }catch(PDOException $e){
            echo "error delete record" . $e->getMessage();
        }
            
        }
        public function getRecordById($tableName, $id)
        {
            $query = "SELECT * FROM $tableName WHERE id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        public  function getElementByColumn($value , $tableName , $colmn)
        {
            $query = "SELECT * FROM `$tableName` WHERE $colmn = :value";
            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':value', $value);
            $stmt->execute();
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if ($data > 0) {
                return $data;
            }
            return [];
        }

    }    

    
    





?>