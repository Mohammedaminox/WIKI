<?php
namespace App\Controllers\Admin;
use App\Models\TagModel;


class TagController {
    private $tagModel;

    public function __construct() {
        $this->tagModel = new TagModel();
    }

    public function index() {

        $Tags = $this->tagModel->getAllTags();
        require(__DIR__.'/../../../Views/dashboard/tags.php');
        
    }
    
    public function addTag()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = ['tag_name' => $_POST['tag_name']];

        $res = $this->tagModel->createTag($data);
            header('Location: /tags');
            exit();
       
    }

}
public function updateTag()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = ['tag_name' => $_POST['updateTagName']];
        $id = $_POST['id'];
        $this->tagModel->updateTag($data, $id);
        header('Location: /tags');
        exit();
       
    }

}
    public function deleteTag() {
        $id=$_POST['id'];
        $this->tagModel->deleteTag($id);
        header('Location: /tags');
    }
}
   

