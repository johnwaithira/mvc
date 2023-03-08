<?php

namespace Students\John\app\Http;

use Students\John\app\Http\Security\Auth\Session;
use Students\John\app\Http\Security\Cipher;

class CSRF
{

    public static function csrf_token()
    {

        $token = Cipher::Encrypt
        (
            md5
            (
                bin2hex
                (
                    random_bytes
                    (
                        15
                    )
                )
            )
        );
        Session::set("csrf_token", $token);

        echo sprintf("<input name='csrf_token' id='token' value='%s' type= 'hidden'>", $token);
    }

    public static function validate($token)
    {
        return Session::get('csrf_token') !== null && Session::get('csrf_token') == $token;
    }
}