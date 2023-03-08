<?php

namespace Students\John\app\Http\Format;

class Input
{
    public static function ImplodeComma($param = [])
    {
        return implode(", ", $param);
    }

    public static function ExplodeDot($params)
    {
        return explode('.', $params);
    }
}