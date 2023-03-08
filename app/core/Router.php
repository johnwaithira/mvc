<?php

namespace Students\John\app\core;

use Students\John\app\Http\Exception\Handler;

/**
 * @property array $routes
 */
class Router
{
    public Response $response;
    public Request $request;

    public Handler $handler;

    public array $routes = [];

    public function __construct(Request $request, Response $response, Handler $handler)
    {
        $this->response = $response;
        $this->request = $request;
        $this->handler = $handler;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function getCallback()
    {
        $path = $this->request->path();
        $method = $this->request->method();

        $path = trim($path, "/");
        $route = $this->routes[$method] ?? [];

        $routeParams = false;

        foreach ($route as $routee => $callback)
        {
            $routee = trim($routee, '/');
            $routeNames = [];

            if(!$routee)
            {
                continue;
            }
            if(preg_match_all('/\{(\w+)(:[^}]+)?}/' , $routee, $matches))
            {
                $routeNames = $matches[1];
            }

            $routeRegex = "@^" . preg_replace_callback('/\{\w+(:([^}]+))?}/', fn($m) => isset($m[2]) ? "({$m[2]})" : '(\w+)', $routee) . "$@";

            if(preg_match_all($routeRegex, $path, $valueMatches))
            {
                $values = [];

                for($i = 1; $i<count($valueMatches); $i++)
                {
                    $values[] = $valueMatches[$i][0];
                }

                $routeParams = array_combine($routeNames, $values);

                $this->request->setRouteParams($routeParams);
                return $callback;
            }


        }

        return false;
    }
    public function resolve()
    {

        $path = $this->request->path();
        $method = $this->request->method();

        $callback = $this->routes[$method][$path];



        if(!$callback)
        {
            $callback = $this->getCallback();
            if($callback === false )
            {
                return $this->handler->_404();
            }
        }
        if(is_string($callback))
        {
            return $this->view($callback);
        }
        if(is_array($callback))
        {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback,$this->request);
    }

    public function view($view, $params = [])
    {
        $layout = $this->layout();
        $content = $this->content($view, $params);

        if (!empty(Application::$app->controller->layout)) {
            return str_replace(
                '{{ content }}',
                $content,
                $layout
            );
        }
        return $content;
    }

    public function layout()
    {
        if(!empty(Application::$app->controller->layout))
        {
            $view = implode(
                '/',
                explode(
                    '.',
                    Application::$app->controller->layout
                )
            );
        }
        ob_start();
        include_once Application::$rootpath."/resources/views/$view.php";
        return ob_get_clean();
    }

    public function content($view, $params)
    {
        foreach($params as $key => $val)
        {
            $$key = $val;
        }

        ob_start();

        $view = implode(
            '/',
            explode(
                '.',
                $view
            )
        );
        include_once Application::$rootpath."/resources/views/$view.php";
        return ob_get_clean();
    }

    public function resources($resource, $params = []): void
    {
        foreach ($params as $key => $val)
        {
            $$key = $val;
        }
        ob_start();
        $view = implode(
            '/',
            explode(
                '.',
                $resource
            )
        );
        include_once /** @lang text */
            Application::$rootpath."/resources/views/$view.php";
        echo ob_get_clean();
    }

    public function resource($view, $params = []): void
    {
        foreach ($params as $key => $val)
        {
            $$key = $val;
        }
        ob_start();

        $array = explode('.', $view);
        /** @var TYPE_NAME $array */
        $ext = end($array);

        $newPath = str_replace(
            '.'.$ext,
            '',
            $view
        );
        $path = implode(
            '/',
            explode(
                '.',
                $newPath
            )
        );

        $view = $path.".".$ext;

        include_once /** @lang text */
            Application::$rootpath."/resources/$view";
        echo ob_get_clean();
    }

    public function redirect($path)
    {
        if($path == "/")
        {
            header('Location: /', $_SERVER['PHP_SELF'], 301,);
        }
        else
        {
            $path = implode('/', explode('.', $path));

            header('Location: /'. $path, $_SERVER['PHP_SELF'], 301);
        }
    }

    /**
     * @param $view
     * @param array $params
     * @return array|bool|string
     */
    public function intended($view, array $params = []): array|bool|string
    {

        return $this->view($view, $params);
    }


}