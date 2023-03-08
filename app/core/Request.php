<?php

namespace Students\John\app\core;

class Request
{

    public array $routeParams = [];
    public function path()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos(
            $path,
            '?'
        );

        /** @var $position */
        return $position === false ? $path : substr(
            $path,
            0,
            $position
        );
    }

    /**
     * @return string
     */
    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function inputs()
    {
        $body = [];

        foreach($_POST as $key => $val)
        {
            /** @var array $body */
            $body[$key] = filter_input(
                INPUT_POST,
                $key,
                FILTER_SANITIZE_SPECIAL_CHARS
            );
        }
        return $body;
    }

    public function files()
    {
        return $_FILES;
    }

    public function setRouteParams($params)
    {
        $this->routeParams = $params;
        return $this;
    }

    public function getrouteParams()
    {
        return $this->routeParams;
    }
}