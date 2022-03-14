<?php

header('Content-Security-Policy: frame-ancestors none');

spl_autoload_register();

const HOME_PATH = '/MVC';
$uri = $_SERVER['REQUEST_URI'];

if (class_exists(\controllers\UsersController::class)){
    define("UserControll", 'controllers\UsersController');
}
if (class_exists(\controllers\HomeController::class)){
    define("HomeControll", 'controllers\HomeController');
}
//$controller = new controllers\UsersController();
//$controller->login();

$controllerName = $_GET['controller'] ?? 'Home';
$actionName = $_GET['action'] ?? 'index';

if ($controllerName == 'Users' ){
    $controller = new UserControll();
    if ($actionName == 'login'){
        $controller->login();
    }
}
else{
    $controller = new HomeControll();
    $controller->index();
}
