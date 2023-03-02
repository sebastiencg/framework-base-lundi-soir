<?php

namespace App;

class Kernel
{

    /**
     * Démarrage de l'application.
     */
    public static function run(){

        // Démarre une session.
        \App\Session::start();

        // Initialise les valeurs par défaut du type et de l'action.
        $type = "home";
        $action = "index";

        // Si les paramètres "type" et "action" sont définis dans l'URL, les récupère.
        if(!empty($_GET['type'])){ $type = $_GET['type']; };
        if(!empty($_GET['action'])){ $action = $_GET['action']; };

        // Transforme le nom du type en notation PascalCase pour obtenir le nom de la classe du contrôleur.
        $type = ucfirst($type);
        $controllerName = "\Controllers\\".$type."Controller";

        // Instancie le contrôleur correspondant au type et appelle la méthode correspondant à l'action.
        $controller = new $controllerName();
        $controller->$action();
    }
}
