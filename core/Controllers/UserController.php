<?php

namespace Controllers;

use Attributes\DefaultEntity;
use Entity\User;

#[DefaultEntity(entityName: User::class)]
class UserController extends AbstractController
{
    public function create(){

        $username=null;
        $mail=null;
        $password=null;

        if(!empty($_POST['username'])){
            $username = htmlspecialchars($_POST['username']);
        }
        if(!empty($_POST['email'])){
            $mail = htmlspecialchars($_POST['email']);
        }
        if(!empty($_POST['password'])){
            if(!empty($_POST['confirm-password'])){
                if ($_POST['confirm-password']==$_POST['password']){
                    $password = htmlspecialchars($_POST['password']);
                }
                else{
                    $this->redirect([
                        "type"=>"user",
                        "action"=>"create",
                        "info"=>"les mots de passes sont differents",
                        "typeAlert"=>"danger"
                        ]);
                }
            }
        }
        if($username&&$mail&&$password){

            $addUser= new User();
            $addUser->setUsername($username);
            $addUser->setMail($mail);
            $addUser->setPassword($password);

            $this->repository->newUser($addUser);

            return $this->redirect([
                "type"=>"user",
                "action"=>"login",
                "info"=>"le compte a bien été créer connecte toi maintenant",
                "typeAlert"=>"success"
            ]);
        }

        $this->render("user/create",[
            "titrePage"=>"register"

        ]);


    }
    public function login(){

        $mail=null;
        $password=null;
        if (!empty($_POST['email'])){
            $mail=htmlspecialchars($_POST['email']);
        }
        if (!empty($_POST['password'])){
            $password=htmlspecialchars($_POST['password']);
        }
        if ($mail&&$password){
            $user=$this->repository->findByMail($mail);
            if ($user){
                if($user->decryptage($password)){
                    $user->logIn();

                    $this->redirect([
                        "type"=>"recette",
                        "action"=>"index",
                        "info"=>"bienvenue ".$user->getUsername(),
                        "typeAlert"=>"success"
                    ]);
                }
                else{
                    $this->redirect([
                        "type"=>"user",
                        "action"=>"login",
                        "info"=>"mdp incorrect",
                        "typeAlert"=>"danger"
                    ]);
                }

            }
            else{
                $this->redirect([
                    "type"=>"user",
                    "action"=>"login",
                    "info"=>"mail incorrect",
                    "typeAlert"=>"danger"
                ]);
            }
        }

        $this->render("user/login",[
            "titrePage"=>"login"

        ]);
    }
    public function logout()
    {

        $user = \App\Session::getUser();
        if($user){
            $user->logOut();
        }
        return $this->redirect([
            "type"=>"user",
            "action"=>"login",
            "info"=>"deconnection",
            "typeAlert"=>"warning"
        ]);

    }
}