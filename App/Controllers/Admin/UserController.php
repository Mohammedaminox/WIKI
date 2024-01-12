<?php
namespace App\Controllers\Admin;
use App\Models\UserModel;


class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {

        $Users = $this->userModel->getAllUsers();
        require(__DIR__.'/../../../Views/dashboard/user.php');
        
    }
}