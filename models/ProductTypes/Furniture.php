<?php

namespace app\models\ProductTypes;

use app\models\Product;

class Furniture extends Product
{
    protected function validateValue()
    {
        if (($this->data['height'] &&  $this->data['height'] < 0)
            || ($this->data['width'] && $this->data['width'] < 0)
            || ($this->data['length'] &&  $this->data['length'] < 0)
        ) {
            return "The dimensions must not be an odd number!";
        }

        if (!$this->data['height'] || !$this->data['width'] || !$this->data['length']) {
            return "One or more of dimensions were not provided!";
        } else {
            $this->value = 'Dimensions: ' . $this->data['height'] . 'x' . $this->data['width'] . 'x' . $this->data['length'];
        }
    }
};
