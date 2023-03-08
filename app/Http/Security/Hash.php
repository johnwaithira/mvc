<?php

namespace Students\John\app\Http\Security;
use Students\John\app\Http\Security\Cipher;
class Hash
{
    public static function make($data): string
    {
        return Cipher::Encrypt($data);
    }

    /**
     * @param $data
     * @return bool|string
     */
    public static function decrypt($data): bool|string
    {
        return Cipher::Decrypt($data);
    }
}