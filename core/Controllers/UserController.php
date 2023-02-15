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
        if(!empty($_POST['mail'])){
            $mail = htmlspecialchars($_POST['mail']);
        }
        if(!empty($_POST['password'])){
            if(!empty($_POST['confirm-password'])){
                if ($_POST['confirm-password']==$_POST['password']){
                    $password = htmlspecialchars($_POST['password']);
                }
            }
        }
        if($username&&$mail&&$password){

        }
        $this->render("user/create",[
            "titrePage"=>"register"

        ]);


    }
    public function login(){
        $this->render("user/login",[
            "titrePage"=>"login"

        ]);
    }
}