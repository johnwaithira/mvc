<?php

namespace Students\John\app\Http\Format\Str;

class Ellipsis
{
    public static function trim($data, $len): string
    {
        /** @var string $data */
        if(!(strlen($data) <= $len))
        {
            $cut = substr($data, 0, $len);
            $end = strpos($cut, '');
            $data = !$end ? (substr($cut, $end)) : substr($cut, 0, $end);
            $data .= " ...";
        }
        /** @var string $data */
        return $data;
    }
}