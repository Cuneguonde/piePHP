<?php

namespace Core;

    class Core
{

    public $controller;
    public function __construct()
    {
    }
    public function run()
    {
        session_start();
        $var = substr($_SERVER['REQUEST_URI'], strlen(BASE_URI) + 1);
        $core = Router::get($var);
        $peudo_class = 'Controller\\' . ucfirst($core['controller']) . 'Controller';
        if (class_exists($peudo_class)) {
            $class = new $peudo_class();
        } elseif (strlen($core['controller']) == 0) {
            $class = new \Controller\AppController();
            $class->index();
        } else {
            echo 'Error 404';
        } 
        if (isset($core['action'])) {   
            $action = $core['action'] /* . 'Action' */;

            if (!method_exists($class, $action)) {
                echo 'Error 404';
            } else {
    
                $class->$action();
            }
        } elseif (isset($class))
        {
            $actions = get_class_methods($class);
            $method = $actions[1];
            $class->$method();
        }
    }
}
