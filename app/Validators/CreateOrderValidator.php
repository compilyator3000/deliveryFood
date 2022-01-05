<?php

namespace App\Validators;

class CreateOrderValidator
{

    private $valid = true;

    public function validOrder(array $order)
    {

        foreach ($order as $item) {

            if (is_array($item)) {
                if (count($item) == 2) {
                    $this->temp = 1;
                }
                $this->validOrder($item);
            } else {

                if (empty($item)) {
                    $this->valid = false;
                }
            }
        }
        if ($this->valid == false) {
            return false;
        }
        return true;

    }

}
