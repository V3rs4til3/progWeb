<?php

header('Content-Security-Policy: frame-ancestors none');

spl_autoload_register();

const HOME_PATH = '/MVC';
$uri = $_SERVER['REQUEST_URI'];
$uri = substr($uri, 1);
$parts = explode('/', $uri);
$uri = array_shift($parts);
print_r($parts);


//to do remplacer get par parts

$controllerName = $_GET['controller'] ?? 'Home';

if (class_exists('\controllers\\' . $controllerName . 'Controller')){
    $controllerName = '\controllers\\' . $controllerName . 'Controller';
    $controller = new $controllerName();

    $actionName = $_GET['action'] ?? 'index';
    if (method_exists($controller, $actionName)){
        $controller->$actionName();
    }
}
else{
    $controller = new \controllers\HomeController();
    $controller->index();
}
