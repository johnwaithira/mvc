<?php

namespace Students\John\app\core;

use Students\John\app\core\Application;
class Controller
{
    public string $layout = "";

    /**
     * @param $layout
     * @return $this
     */
    public function setLayout($layout): static
    {
        $this->layout = $layout;
        return $this;
    }

    /**
     * @param $view
     * @param $params
     * @return array|bool|string
     */
    public function view($view, $params = []): array|bool|string
    {
        return Application::$app->router->view($view, $params);
    }

    /**
     * @return void
     */
    public function redirect($path)
    {
        return Application::$app->router->redirect($path);
    }

    public function dump($data)
    {
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    }

}