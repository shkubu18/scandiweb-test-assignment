<?php

namespace app\models\ProductTypes;

use app\models\Product;

class Book extends Product
{
    protected function validateValue()
    {
        if (!$this->data['weight']) {
            return "Weight was not provided!";
        } else if ($this->data['weight'] < 0) {
            return "The weight must not be an odd number!";
        } else {
            $this->value = 'Weight: ' . $this->data['weight'] . ' KG';
        }
    }
}
