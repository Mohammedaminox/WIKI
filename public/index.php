<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/../vendor/autoload.php';


use App\Controllers\Admin\CategoryController;
use Routes\Router;

session_start();


ob_start();


$router = new Router();

//get
// $router->get('/Categories', 'App\Controllers\CategoryController@getAllCategories');
$router->get('/', 'App\Controllers\Admin\CategoryController@index');
$router->get('/tags', 'App\Controllers\Admin\tagController@index');
$router->get('/users', 'App\Controllers\Admin\userController@index');



//-------------------------------------------------------------------------------------------------------------------------
//post
$router->post('/addCategory', 'App\Controllers\Admin\CategoryController@addCategory');
$router->post('/Category/delete', 'App\Controllers\Admin\CategoryController@deleteCategory');
$router->post('/Category/update', 'App\Controllers\Admin\CategoryController@updateCategory');
$router->post('/addTag', 'App\Controllers\Admin\TagController@addTag');
$router->post('/tag/delete', 'App\Controllers\Admin\TagController@deleteTag');
$router->post('/tag/update', 'App\Controllers\Admin\TagController@updateTag');



$router->route($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);


ob_end_flush();
?>