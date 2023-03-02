<?php

namespace Controllers;
use Attributes\DefaultEntity;
use Entity\Avis;
use Entity\Recette;

#[DefaultEntity(entityName: Avis::class)]
class AvisController extends AbstractController
{
    public function create(){

        $userId=null;
        $recetteId=null;
        $star=null;

        if(!$this->getUser()){
            return $this->redirect([
                "type"=>"recette",
                "action"=>"show",
                "id"=>$recetteId,
                "info"=>"connecte toi d'abord"
            ]);
        }

        if (!empty($_GET['userId'])&&ctype_digit($_GET['userId'])){
            $userId=$_GET['userId'];
        }
        if (!empty($_GET['recetteId'])&&ctype_digit($_GET['recetteId'])){
            $recetteId=$_GET['recetteId'];
        }

        if ($recetteId && $userId){

            $verification=$this->repository->checkAvis($recetteId,$userId);

            if ($verification && $_POST['star']=="on"){
                return $this->redirect([
                    "type"=>"recette",
                    "action"=>"show",
                    "id"=>$recetteId,
                    "info"=>"vous avez deja liké cette recette",
                    "typeAlert"=>"warning"
                ]);
            }
            if ($verification && $_POST['star']!="on"){
                $this->repository->removeAvis($recetteId,$userId);

                $recetteRepository=$this->getRepository(entityName: Recette::class);
                $recette =$recetteRepository->findById($recetteId);
                $compteurDeLike=$recette->getCompteurLike()-1;
                $recetteRepository->avis($recetteId,$compteurDeLike);

                return $this->redirect([
                    "type"=>"recette",
                    "action"=>"show",
                    "id"=>$recetteId,
                    "info"=>"changement enregistré",
                    "typeAlert"=>"warning"
                ]);
            }

            if(empty($_POST['star'])){
                return $this->redirect([
                    "type"=>"recette",
                    "action"=>"show",
                    "id"=>$recetteId,
                ]);
            }
            else{

                $this->repository->newAvis(true,$recetteId,$userId);

                $recetteRepository=$this->getRepository(entityName: Recette::class);
                $recette =$recetteRepository->findById($recetteId);
                $compteurDeLike=$recette->getCompteurLike()+1;
                $recetteRepository->avis($recetteId,$compteurDeLike);

                return $this->redirect([
                    "type"=>"recette",
                    "action"=>"show",
                    "id"=>$recetteId,
                    "info"=>"like enregistré",
                    "typeAlert"=>"success"
                ]);
            }
        }
        else{
            return $this->redirect([
                "type"=>"recette",
                "action"=>"show",
                "id"=>$recetteId
            ]);
        }
    }
}