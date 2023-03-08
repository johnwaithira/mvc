<?php

namespace Students\John\app\Http\Exception;

use Students\John\app\core\Application;
use Students\John\app\core\Controller;

class Handler extends Controller
{

    public function _404(): bool|array|string
    {
        Application::$app->router->resources('layouts.auth.navigation');
        Application::$app->router->response->setResposeCode(404);
        return $this->view('errors.404', ['url' => $_SERVER['REQUEST_URI']]);

    }
}