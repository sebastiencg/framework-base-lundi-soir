<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Entity\Avis;
use Entity\Film;

#[DefaultEntity(entityName: Avis::class)]
class AvisController extends AbstractController
{

    public function create(){

        $filmId = null;
        $content = null;

        if(!empty($_POST['filmId']) && ctype_digit($_POST['filmId'])){$filmId = $_POST['filmId'];}
        if(!empty($_POST['content'])){$content = htmlspecialchars($_POST['content']);}

        if($filmId && $content){

            $film = $this->getRepository(Film::class)->findById($filmId);

            if(!$film){
                return $this->redirect();
            }

            $avis = new Avis();
            $avis->setContent($content);
            $avis->setFilmId($filmId);

            $this->repository->insert($avis);

            return $this->redirect([
                "type"=>"film",
                "action"=>"show",
                "id"=>$film->getId()
            ]);

        }

        return $this->redirect();

    }

    public function remove(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET["id"])){
            $id = $_GET['id'];
        }

        if(!$id){ return $this->redirect(); }

        $avis = $this->repository->findById($id);

        if(!$avis){ return $this->redirect(); }

        $filmId = $avis->getFilmId();

        $this->repository->delete($avis);

        return $this->redirect([
            "type"=>"film",
            "action"=>"show",
            "id"=>$filmId
        ]);

    }


}