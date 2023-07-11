<?php


require 'core/router.php';
require 'controller/controller.php';

session_start();

$controllers = new controller();
$router = new router();


$router->post('/', 'index');
$router->post('/create_database', 'create_database');
$router->post('/create_table', 'create_table');
$router->post('/create_data', 'create_data');

if(isset($_POST['aid'])){
    $k =$_POST['aid'];
    $controllers->gettingtable($_POST['aid']);
//    echo json_encode($k);

}





$router->routingFunction();
