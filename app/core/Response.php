<?php

namespace Students\John\app\core;

class Response
{
    public function setResposeCode($code)
    {
        http_response_code($code);
    }
}