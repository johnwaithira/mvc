<?php

namespace Students\John\app\Http\Format\Str;

class Slug
{
    public static function make($slug)
    {
        /** @var string $slug */
        return preg_replace(
        /** @lang text */ '/[^a-z0-9]+/i',
            '-', trim(strtolower($slug))
        );
    }
}