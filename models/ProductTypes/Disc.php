<?php

namespace app\models\ProductTypes;

use app\models\Product;

class Disc extends Product
{
    protected function validateValue()
    {
        if (!$this->data['size']) {
            return "Size was not provided!";
        } else if ($this->data['size'] < 0) {
            return "The size must not be an odd number!";
        } else {
            $this->value = 'Size: ' . $this->data['size'] . ' MB';
        }
    }
};
