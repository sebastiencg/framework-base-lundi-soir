<?php

require_once ('core/App/View.php');
require_once ('core/Entity/Truc.php');

$trucEntity = new \Entity\Truc();



App\View::render('trucs/index',
    ["trucs"=>$trucEntity->findAll()]
);
