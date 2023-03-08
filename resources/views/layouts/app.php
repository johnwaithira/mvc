<?php
use Students\John\app\core\Application;

Application::$app->router->resources('layouts.head');
?>

    {{ content }}

<?php
Application::$app->router->resources('layouts.footer');