<?php

namespace Students\John\app\Http\Security;

class Validate
{
    public static function csrf()
    {
        $request = new Request();
        if(CSRF::validate($request->inputs()['csrf_token']))
        {
            return true;
        }
        return false;
    }
}