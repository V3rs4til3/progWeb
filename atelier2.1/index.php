<?php
header('Content-Security-Policy: frame-ancestors none');

spl_autoload_register();
//header('location: MVC\Views\index.php');
$controller = new JeuxController();
$controller = $controller->loadGames();
?>