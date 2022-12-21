<?php

namespace app\core;

use app\models\Product;
use PDO;

class Database
{
    private $server = 'localhost';
	private $dbname = 'scandiweb-test';
	private $user = 'root';
	private $pass = '';

    private $pdo = null;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->dbname, $this->user, $this->pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getProducts()
    {
        $statement = $this->pdo->prepare('SELECT * FROM products');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (sku, name, price, type, value)
                VALUES (:sku, :name, :price, :type, :value)");

        $statement->bindValue(':sku', $product->sku);
        $statement->bindValue(':name', $product->name);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':type', $product->type);
        $statement->bindValue(':value', $product->value);

        $statement->execute();
    }

    public function getProductBySku($sku)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE sku = :sku');
        $statement->bindValue(':sku', $sku);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct()
    {
        for ($i = 0; $i < count($_POST['products']); $i++) {
            $del_id = $_POST['products'][$i];
            $statement = $this->pdo->prepare("DELETE FROM products WHERE id = '$del_id'");
            $statement->execute();
        }
    }
}
