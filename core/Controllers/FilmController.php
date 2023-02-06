<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Attributes\UsesEntity;
use Entity\Film;

#[DefaultEntity(entityName: Film::class)]
class FilmController extends AbstractController
{


    public function index(){

        $films = $this->repository->findAll();

        return $this->render("films/index", [
            "pageTitle"=>"les films",
            "films"=>$films
        ]);
    }

    public function show(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET["id"])){
            $id = $_GET['id'];
        }

        if(!$id){ return $this->redirect(); }

        $film = $this->repository->findById($id);

        if(!$film){return $this->redirect(); }

        return $this->render("films/show", [
            "pageTitle"=> $film->getTitle(),
            "film"=>$film
        ]);



    }


}