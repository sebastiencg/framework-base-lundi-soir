<?php

namespace App;

class Kernel
{

    public static function run(){

        \App\Session::start();


        $type = "home";
        $action = "index";


        if(!empty($_GET['type'])){ $type = $_GET['type']; };
        if(!empty($_GET['action'])){ $action = $_GET['action']; };

        $type = ucfirst($type);
        $controllerName = "\Controllers\\".$type."Controller";


        $controller = new $controllerName();

        $controller->$action();




        }

}