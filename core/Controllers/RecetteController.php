<?php

namespace Controllers;

use App\File;
use App\UploadFile;
use Attributes\DefaultEntity;
use DateTime;
use Entity\Commentaire;
use Entity\CommentaireRecette;
use Entity\Recette;
use Entity\User;

#[DefaultEntity(entityName: Recette::class)]
class RecetteController extends AbstractController
{
    public function index()
    {
        return $this->render("recettes/index", [
            "reponses"=>$this->repository->findAll(),
            "titrePage"=>"tous nous recettes"
        ]);
    }

    public function plat(){
        return $this->render("recettes/index", [
            "reponses"=>$this->repository->findAll("plat"),
            "titrePage"=>"tous nous plat"
        ]);
    }
    public function dessert(){
        return $this->render("recettes/index", [
            "reponses"=>$this->repository->findAll("dessert"),
            "titrePage"=>"tous nous dessert"
        ]);
    }
    public function show(){
        $id= null;
        if(!empty($_GET['id'])&&ctype_digit($_GET['id'])){
            $id=$_GET['id'];

            $reponse=$this->repository->findById($id);

            $commentaireRepository=$this->getRepository(entityName: Commentaire::class);

            $commentaires =$commentaireRepository->findAllById($id);
            $userRepository=$this->getRepository(entityName: User::class);

            $user =$userRepository->findById($reponse->getUserId());


            return $this->render("recettes/show",[
                "reponse"=>$reponse,
                "user"=>$user,
                "commentaires"=>$commentaires,
                "titrePage"=> $reponse->getTitre()
            ]);
        }
        return $this->redirect([ "type"=>"recette", "action"=>"index"]);
    }

    public function remove(){

        $id=null;
        $user=null;

        if(!empty($_GET['id'])&&ctype_digit($_GET['id'])){
            $id=$_GET['id'];

            $reponse=$this->repository->findById($id);
            $auteur =$reponse->getUserId();
            if($this->getUser()){
                $user =$this->getUser()->getId();
            }
            if($user!=$auteur){
                return $this->redirect([
                    "type"=>"recette",
                    "action"=>"index",
                    "info"=>"tu ne peux pas supprimer une recette que tu n'as pas rédiger",
                    "typeAlert"=>"warning"
                ]);
            }

            if($reponse){

                 $this->repository->delete($id);
                 $this->redirect([ "type"=>"recette", "action"=>"index","info"=>"recette supprimer","typeAlert"=>"warning"]);
            }
            $this->redirect([ "type"=>"recette", "action"=>"index","info"=>"il y'a eu une erreur","typeAlert"=>"warning"]);

        }

        $this->redirect([ "type"=>"recette", "action"=>"index","info"=>"il y'a eu une erreur","typeAlert"=>"warning"]);

    }

    public function create(){

        $titre= null;

        $typeRecette=null;

        $recette=null;

        if(!$this->getUser()){
            return $this->redirect([
                "info"=>"connecte toi d'abord"
            ]);
        }

        if(!empty($_POST['titre'])){
            $titre=htmlspecialchars($_POST['titre']);
        }
        if(!empty($_POST['typeRecette'])){
            $typeRecette=htmlspecialchars($_POST['typeRecette']);
        }
        if(!empty($_POST['recette'])){
            $recette=htmlspecialchars($_POST['recette']);
        }
        if(!empty($_FILES['image'])){
            $image=new UploadFile('image');
        }
        if($titre&&$typeRecette&&$recette&&$image){
            $date=new DateTime();
            $date=$date->format("d/m/y");
            $heure=new DateTime();
            $heure=$heure->format("H:i");

            $addRecette=new Recette();
            $addRecette->setTitre($titre);
            $addRecette->setTypeRecette($typeRecette);
            $addRecette->setRecette($recette);
            $addRecette->setDate($date);
            $addRecette->setHeure($heure);
            $addRecette->setImage($image->upload());
            $addRecette->setUser($this->getUser());


            $this->repository->newRecette($addRecette);

            $this->redirect([
               "type"=>"recette",
                "action"=>"index",
                "info"=>"nouvelle recette",

            ]);
        }

        return $this->render("recettes/create",[
            "titrePage"=>"nouvelle recette"
        ]);

    }

    public function change(){

        $id = null;
        $titre = null;
        $typeRecette = null;
        $recette = null;
        if (!empty($_POST['titre'])) {
            $titre = htmlspecialchars($_POST['titre']);
        }
        if (!empty($_POST['recette'])) {
            $recette = htmlspecialchars($_POST['recette']);
        }
        if (!empty($_POST['typeRecette'])) {
            $typeRecette = htmlspecialchars($_POST['typeRecette']);
        }
        if (!empty($_POST['id'])) {
            if (ctype_digit($_POST['id'])) {
                $id = $_POST['id'];
            }
        }
        if (!empty($_GET['id'])) {
            if (ctype_digit($_GET['id'])) {
                $id = $_GET['id'];

                $reponse=$this->repository->findById($id);
                $auteur =$reponse->getUserId();
                if($this->getUser()){
                    $user =$this->getUser()->getId();
                }
                if($user!=$auteur){
                    return $this->redirect([
                        "type"=>"recette",
                        "action"=>"index",
                        "info"=>"tu ne peux pas modifier une recette que tu n'as pas rédiger",
                        "typeAlert"=>"warning"
                    ]);
                }

                if($reponse){

                    return $this->render("recettes/update",[
                        "reponse"=>$reponse,
                        "titrePage"=>"mise a jour de la recette"
                    ]);
                }
            }
        }

        if ($titre && $typeRecette && $recette && $id) {

            $reponse=$this->repository->findById($id);

            if($reponse){

                $this->repository->update($id,$titre,$typeRecette,$recette);

                return $this->redirect(["type"=>"recette", "action"=>"index","info"=>"mise a jour effectuer"]);
            }

        }
        return $this->redirect(["type"=>"recette", "action"=>"index"]);


    }

}