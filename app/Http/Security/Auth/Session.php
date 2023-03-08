<?php

namespace Students\John\app\Http\Security\Auth;

session_start();
class Session
{
    public static function SESSION()
    {
        return $_SESSION;
    }
    public static function flush()
    {
        session_destroy();
    }

    public static function clean($name)
    {
        unset($_SESSION[$name]);
    }

    public static function set($name, $params = [])
    {
        return $_SESSION[$name] = $params;
    }

    public static function get($name)
    {
        return $_SESSION[$name];
    }
}