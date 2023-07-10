<?php


require 'core/router.php';
require 'controller/controller.php';

session_start();

$controllers = new controller();
$router = new router();

$router->get('/', 'index');
$router->post('/create_database', 'create_database');
$router->post('/create_table', 'create_table');






$router->routingFunction();
