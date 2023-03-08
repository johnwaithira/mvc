<?php
use Students\John\app\core\Application;

Application::$app->router->resources('layouts.auth.head');
?>

    {{ content }}

<?php
Application::$app->router->resources('layouts.auth.footer');