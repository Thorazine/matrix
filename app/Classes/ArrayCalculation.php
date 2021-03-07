<?php

namespace App\Classes;

class ArrayCalculation {

    /*
     * Multiply the values in the array and return the sum
     */
    public function multiply(array $values) : int
    {
        $sum = $values[0];
        for($i = 1; $i < count($values); $i++) {
            $sum = $sum * $values[$i];
        }
        return $sum;
    }

}
