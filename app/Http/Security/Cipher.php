<?php

namespace Students\John\app\Http\Security;

define("ciphering", "AES-128-CTR");
define("encryption_key", "873744b4803834e4");
define("encryption_iv","1122224499112243");
define("option", 0);
class Cipher
{
    public static function Encrypt($data)
    {
        return openssl_encrypt($data,
            ciphering,
            encryption_iv,
            option,
            encryption_key
        );
    }

    /**
     * @param $data
     * @return bool|string
     */
    public static function Decrypt($data)
    {
        return openssl_decrypt($data,
            ciphering,
            encryption_iv,
            option,
            encryption_key
        );
    }
}