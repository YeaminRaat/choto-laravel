<?php


require "autoload.php";

use src\Container;
use src\Controller\UserController;


$container = new Container();



$container->bind(UserController::class);


var_dump($container);



