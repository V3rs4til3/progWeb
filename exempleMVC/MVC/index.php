<?php

spl_autoload_register();

header('Content-Security-Policy: frame-ancestors none');

const HOME_PATH = '/MVC';
$uri = $_SERVER['REQUEST_URI'];
$uri = substr($uri, 1);
$parts = explode('/', $uri);
$uri = array_shift($parts);

$controllerName = $parts[0] ?? 'Home';

if (class_exists('\controllers\\' . $controllerName . 'Controller')){
    $controllerName = '\controllers\\' . $controllerName . 'Controller';

    $controller = new $controllerName();

    $actionName = $parts[1] ?? 'index';

    if (method_exists($controller, $actionName))
        $controller->$actionName();
}
else{
    $controller = new \controllers\HomeController();
    $controller->index();
}
