<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Entity\Commentaire;
#[DefaultEntity(entityName: Commentaire::class)]
class CommentaireController extends AbstractController
{
    public function create(){

        $commentaire=null;
        $recetteId=null;

        if(!empty($_POST['commentaire'])){

            $commentaire=htmlspecialchars($_POST['commentaire']);
        }
        if(!empty($_POST['id_recette'])&&ctype_digit($_POST['id_recette'])){
            $recetteId=$_POST['id_recette'];
        }

        if ($commentaire&&$recetteId){

            $this->repository->newCommentaire($recetteId,$commentaire);
            $this->redirect(["type"=>"recette", "action"=>"show" ,"id"=>"$recetteId","info"=>"commentaire ajouté"]);
        }
        $this->redirect(["type"=>"recette", "action"=>"show" ,"id"=>"$recetteId"]);

    }

    public function remove(){

        $id=null;

        if(!empty($_GET['id'])&&ctype_digit($_GET['id'])){
            $id=$_GET['id'];

            $this->repository->delete($id);
        }


        $this->redirect(["type"=>"recette", "action"=>"index","info"=>"commentaire supprimé","typeAlert"=>"warning" ]);
    }
}