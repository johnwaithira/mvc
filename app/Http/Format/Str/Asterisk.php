<?php

namespace Students\John\app\Http\Format\Str;

use Students\John\app\Http\Format\Str\Str;

class Asterisk
{
    public static function make($text, $len)
    {
        return sprintf('%s****%s',
            substr($text, 0, (int)$len),
            substr($text, -(int)$len)
        );
    }
    public static function makeDiff($data, $init , $int)
    {
        $asterisks = strlen($data) - ($init + $int);

        return sprintf(
            '%s'.self::gen($asterisks).'%s',
            Str::startsWith(
                $data, $init
            ),
            Str::endsWith(
                $data, $int
            )
        );
    }
    public static function gen($num)
    {
        $val = "";
        for ($i = 0; $i < $num; $i++)
        {
            $val .= "*";
        }
        return $val;
    }
}