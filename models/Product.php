<?php

namespace app\models;

use app\core\Database;

abstract class Product
{
    public string $sku;
    public string $name;
    public float $price;
    public string $type;
    public string $value;
    public array $data;

    public function __construct($input)
    {
        $this->data = $input;
    }

    public function validateData()
    {
        $warnings = [];
        if ($this->validateSku()) {
            $warnings[] = $this->validateSku();
        }
        if ($this->validateName()) {
            $warnings[] = $this->validateName();
        }
        if ($this->validatePrice()) {
            $warnings[] = $this->validatePrice();
        }
        if ($this->validateType()) {
            $warnings[] = $this->validateType();
        }
        if ($this->validateValue()) {
            $warnings[] = $this->validateValue();
        }
        return $warnings;
    }


    private function validateSku()
    {
        if (!$this->data['sku']) {
            return "Product SKU is required!";
        } else if (strlen($this->data['sku']) < 4) {
            return "Product SKU should contain at least four numbers or letters";
        } else {
            $this->sku = $this->data['sku'];
        }

        $db = new Database();
        if ($db->getProductBySku($this->data['sku'])) {
            return "This SKU already taken, please enter different SKU!";
        }
    }

    private function validateName()
    {
        if (!$this->data['name']) {
            return "Product name is required!";
        } else if (is_numeric($this->data['name'])) {
            return "The product name must not be a number!";
        } else {
            $this->name = $this->data['name'];
        }
    }

    private function validatePrice()
    {
        if (!$this->data['price']) {
            return "Product price is required!";
        } else if ($this->data['price'] < 0) {
            return "The price must not be an odd number!";
        } else {
            $this->price = floatval($this->data['price']);
        }
    }

    private function validateType()
    {
        if (!$this->data['type']) {
            return "Please indicate the type of the product!";
        }

        $this->type = $this->data['type'];
    }

    abstract protected function validateValue();
}
