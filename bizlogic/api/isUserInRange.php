<?php

class UserRange
{
    static function isUserinRange($number, $min, $max)
    {
    
        $inclusive = FALSE;
        if (is_int($number) && is_float($min) && is_float($max)) {
            return $inclusive
                ? ($number >= $min && $number <= $max)
                : ($number > $min && $number < $max);
                
        }

        return FALSE;
    }
}
