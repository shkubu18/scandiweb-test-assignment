<?php

use app\controllers\ProductController;
use app\core\Database;
use app\core\Router;

require_once __DIR__ . './../vendor/autoload.php';


$database = new Database();
$router = new Router($database);

$router->get('/', [ProductController::class, 'index']);
$router->post('/add-product', [ProductController::class, 'create']);
$router->post('/delete', [ProductController::class, 'delete']);

$router->resolve();

