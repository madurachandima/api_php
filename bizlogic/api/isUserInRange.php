<?php

class UserRange
{
    static function isUserinRange($number, $min, $max)
    {
    
        // print($number);
        // print("___");
        // print($min);
        // print("___");
        // print($max);
        // print("..................");

        $inclusive = FALSE;
        if (is_int($number) && is_float($min) && is_float($max)) {
            return $inclusive
                ? ($number >= $min && $number <= $max)
                : ($number > $min && $number < $max);
                
        }

        return FALSE;
    }
}
