<?php

namespace Core;

class Router
{

    private static $routes;
    public $pseudo_controllers = [];
    
    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
    }

    public static function get($url)
    {

        if (strrpos($url,'/')) {
            $delimiter = (strrpos($url,'/'));
            $pseudo_controllers['controller'] = str_replace('/','\\',substr($url,0, $delimiter));
            $pseudo_controllers['action'] = substr($url, $delimiter + 1,strlen($url));
            return $pseudo_controllers;
        }
        else {
            $pseudo_controllers['controller'] = $url;
            return $pseudo_controllers;
        }
    }
  /*           if (class_exists($controller[0])) {
                $pseudo_controller['controller'] = $controller[0];
                return $pseudo_controller;
            }
        }
        else {
        foreach($controller as $value) {
            if (class_exists($value)) {
                $pseudo_controller['controller'] = $value;
                
            }
        }
    } */
/*         if (sizeof($controller) > 1) {
            $method = end($controller) . 'Action';
            $pseudo_controller['action'] = $method;
        }
        if (!class_exists('Controller' . '\\' . ucfirst($controller[0]) . 'Controller')) {
            return false;
        }
        else {
            $pseudo_controller['controller'] = 'Controller' . '\\' . ucfirst($controller[0]) . 'Controller';
            return $pseudo_controller;
        } */

    

    


    // foreach (self::$routes as $value) {

    //     $var1 = $controller[0];
    //     $var2 = $value['controller'];

    //     if ($var1 == $var2) { // On verifie si les élements de notre URL ne correspondent pas à des routes du script 'routes.php'
    //         var_dump($value);
    //         return $value;
    //     }
    // }


    //Méthode statique demandée en page 9
/*     public static function get($url)
    {
        var_dump($url);
        $shortUrl = substr($url, strlen(BASE_URI));
        //if (array_key_exists(substr($url, strlen(BASE_URI)), self::$routes)) {

            if ($shortUrl == '/') {
                include './src/Controller/AppController.php';

                $appController = new \Controller\AppController();
                $appController->indexAction();
            } else if ($shortUrl == '/register') {
                include './src/Controller/UserController.php';
                $appController = new \Controller\UserController();
                $appController->register();
            }
   //     }
    } */
}
