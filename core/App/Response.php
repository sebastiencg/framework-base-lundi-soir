<?php

namespace App;

class Response
{

    public static function redirect($url = null){

        if(!$url){
            $url = "index.php";
        }

        header("Location: ${url}");
        exit();

    }
}