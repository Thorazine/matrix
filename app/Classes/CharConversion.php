<?php

namespace App\Classes;

class CharConversion {

    /*
     * Convert an array of characters to an array of integers
     */
    public function arrayToNumbers(array $values) : array
    {
        $array = [];
        foreach($values as $value) {
            array_push($array, $this->lettersToNumber($value));
        }
        return $array;
    }


    /*
     * Convert alpha to base26 number
     */
    public function lettersToNumber(string $letters) : int
    {
        $letters = strtoupper($letters);
        $alphabet = range('A', 'Z');
        $number = 0;

        foreach(str_split(strrev($letters)) as $key => $char) {
            $number = $number + (array_search($char, $alphabet) + 1) * pow(count($alphabet), $key);
        }

        return $number;
    }

    /*
     * Convert base26 to alpha
     */
    public function numberToLetters(int $number) : string
    {
        $number -= 1;
        for($r = ""; $number >= 0; $number = intval($number / 26) - 1) {
            $r = chr($number%26 + 0x41) . $r;
        }
        return $r;
    }


}
