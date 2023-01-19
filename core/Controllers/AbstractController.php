<?php

namespace Controllers;
require_once ('core/App/View.php');


class AbstractController
{
    protected object $defaultEntity;

    protected string $defaultEntityName;

    public function __construct()
    {
        $this->defaultEntity = new $this->defaultEntityName();
    }


    public function render($template, $data){
        return \App\View::render($template, $data);
    }
    public function redirect(? string $url=null){
        return \App\Response::redirect($url);
    }
}