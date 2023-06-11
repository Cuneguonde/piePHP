<?php
//https://www.developpez.net/forums/blogs/32058-rawsrc/b5109/autoloader/

define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'piePHP' . DIRECTORY_SEPARATOR);
$autoloader = function ($full_class_name) {
    $name = explode("\\", $full_class_name);
    //TEST
    
    $name = end($name);
    $core = DIR_ROOT . 'Core' . DIRECTORY_SEPARATOR;
    $src = DIR_ROOT . 'src' . DIRECTORY_SEPARATOR . 'Controller' . DIRECTORY_SEPARATOR;
    $model = DIR_ROOT . 'src' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR;

    if (is_file($core . $name . '.php')) {
        try {
            include $core . $name . '.php';
        } catch (ERROR $e) {
            echo 'probleme: ' . $e;
        }
        return true;
    } elseif (is_file($src . $name . '.php')) {
        try {
            include $src . $name . '.php';
        } catch (ERROR $e) {
            echo 'probleme: ' . $e;
        }
    }
        elseif (is_file($model . $name . '.php')) {
            try {
                include $model . $name . '.php';
            } catch (ERROR $e) {
                echo 'probleme: ' . $e;
            }
        
    } else {
        return false;
    }
};

spl_autoload_register($autoloader);
