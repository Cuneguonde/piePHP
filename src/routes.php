<?php 
//require_once("./Core/Router.php");
//use Core\Router;
Core\Router::connect('/', ['controller' => 'app' ,'action' => 'index']);
Core\Router::connect('/register', ['controller' => 'user' ,'action' => 'add']);  
    