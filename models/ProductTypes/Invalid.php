<?php

namespace app\models\ProductTypes;

use app\models\Product;

class Invalid extends Product
{
    protected function validateValue()
    {
        return "Please indicate the type of the product!";
    }
}