<?php

namespace app\controllers;

use app\core\Database;
use app\core\Router;
use app\models\ProductTypes\Invalid;

class ProductController
{
    public static function index(Router $router)
    {
        $db = new Database();
        $router->renderView('list', [
            'products' => $db->getProducts()
        ]);
    }

    public static function create(Router $router)
    {
        $product = new Invalid([]);
        $warnings = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productData = [];
            foreach ($_POST as $key => $value) {
                $productData[$key] = $value;
            }

            $providedProduct = "app\\models\\ProductTypes\\" . $_POST['type'];
            
            if (class_exists($providedProduct)) {
                $product = new $providedProduct($productData);
            } else {
                $product = new Invalid($productData);
            }

            $warnings = $product->validateData();

            if (!$warnings) {
                $db = new Database();
                $db->createProduct($product);
                header('Location: /');
                exit;
            }
        }

        $router->renderView('add-product', [
            'warnings' => $warnings
        ]);
    }

    public static function delete()
    {
        if ($_POST) {
            for ($i = 0; $i < count($_POST['products']); $i++) {
                $db = new Database();
                $db->deleteProduct();
            }
        }
        header('Location: /');
    }
}
