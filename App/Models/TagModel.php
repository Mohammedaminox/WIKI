<?php

namespace App\Models;

use Config\DbConnection;
use PDO;
use PDOException;


class TagModel extends Crud
{

    public function getAllTags()
    {
        return $this->read('tags');
    }

    public function getTagById($id)
    {
        return $this->getRecordById('tags', $id);
    }



    public function createTag($data)
    {

        $this->create('tags', $data);
    }

    public function updateTag($data, $id)
    {
        $this->update('tags', $data, $id);
    }
    public function deleteTag($id)
    {
        $this->delete('tags', $id);
    }
}
