<?php

namespace Students\John\app\Http\Format\Generator;

class Rand
{
    public static function make($len)
    {
        return bin2hex(random_bytes($len));
    }

    /**
     * @param $min_len
     * @param $max_len
     * @return int
     */
    public static function number($min_len, $max_len)
    {
        return rand($min_len, $max_len);
    }
}