<?php
session_start();
if(!isset($_SESSION['connected'])) {
    $_SESSION['connected'] = "non";
}

// Autoloader
require_once "modele/Service/Autoloader.php";
\modele\Service\Autoloader::register();
require_once "vendor/autoload.php";

$configuration = [];
require __DIR__.'/config/configuration.php';
$container = new \modele\Service\Container($configuration);

$router = new \modele\Service\Router($_SERVER['REQUEST_URI']);
$resolve = $router->resolve();

$controllerCaller = $resolve['controllerCaller'];
$action = $resolve['action'];

var_dump($controllerCaller);
$controller = $container->$controllerCaller();
call_user_func_array([$controller, $action], $resolve['params']);