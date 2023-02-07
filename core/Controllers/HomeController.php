<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Attributes\TargetEntity;
use Attributes\TargetRepository;
use Attributes\UsesEntity;
use Entity\AbstractEntity;
use Entity\Recette;


#[DefaultEntity(entityName: Recette::class)]

class HomeController extends AbstractController
{


    public function index()
    {
        return $this->render("home/index", [
            "titrePage"=>"home"
        ]);
    }

}