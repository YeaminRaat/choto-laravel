<?php


require "autoload.php";

use src\Container;
use src\Controller\UserController;
use src\Facade\Route;
use src\Router;
use src\Facade;

$container = new Container();

Facade::$CONTAINER = $container;


$container->bind(UserController::class);
$container->bind('router',Router::class);

$route = $container->make('router');


Route::get('/', function() {
    return 'It\'s working';
});

Route::get('/test', function() {
    return 'from route';
});


$route->dispatch();