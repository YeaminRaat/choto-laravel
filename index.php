<?php


require "autoload.php";

use src\Container;
use src\Controller\UserController;
use src\Router;

$container = new Container();



$container->bind(UserController::class);
$container->bind(Router::class);

$route = $container->make(Router::class);


$route->get('/', function() {
    return 'It\'s working';
});

$route->get('/test', function() {
    return 'from route';
});

$route->dispatch();