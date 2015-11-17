<?php

//display error
ini_set('display_errors', 'On');
ini_set('html_errors', 0);
error_reporting(-1);

//session
session_start();

//autoload component
require 'vendor/autoload.php';

//router
$router = new Gears\Router();
$router->routesPath = 'app/route.php';
$router->dispatch();