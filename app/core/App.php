<?php

namespace core;

class App
{

    public static function start(){

        require APP . 'config' . DS . 'db.php';

        Session::start();

        $controller = 'controllers' . DS . 'MainController';
        $action = 'index';

        $url = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $routes = explode('/', $url);

        if(count($routes) < 3){

            if (file_exists(APP . 'controllers' . DS . $routes[1] . 'Controller.php')){
                $controller = 'controllers' . DS . $routes[1] . 'Controller';
            }elseif(method_exists('controllers' . DS . 'MainController', $routes[1])){
                $action = $routes[1];
            }

        }else{
            if (file_exists(APP . 'controllers' . DS . $routes[1] . 'Controller.php')){
                $controller = 'controllers' . DS . $routes[1] . 'Controller';
                if(method_exists($controller, $routes[2])) {
                    $action = $routes[2];
                }
            }
        }

        if( (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0) && $controller == 'controllers' . DS . 'adminController') {
            $controller = 'controllers' . DS . 'mainController';
            $action = 'login';
        }

        $controller = new $controller;

        call_user_func_array([$controller, $action], $_GET);

    }

}