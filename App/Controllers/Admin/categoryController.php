<?php
namespace App\Controllers\Admin;
use App\Models\CategoryModel;


class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

    public function index() {

        $categories = $this->categoryModel->getAllCategories();
        require(__DIR__.'/../../../Views/dashboard/category.php');
        
    }
    
    public function addCategory()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = ['category_name' => $_POST['category_name']];

        $res = $this->categoryModel->createCategory($data);
            header('Location: /');
            exit();
       
    }

}
public function updateCategory()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = ['category_name' => $_POST['updateCategoryName']];
        $id = $_POST['id'];
        $this->categoryModel->updateCategory($data, $id);
        header('Location: /');
        exit();
       
    }

}
    public function deleteCategory() {
        $id=$_POST['id'];
        $this->categoryModel->deleteCategory($id);
        header('Location: /');
    }
}
   

