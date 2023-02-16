<?php

namespace App;

abstract class Secutity implements userInterface
{
    protected int $id;
    protected string $username;
    protected string $mail;
    protected string $password;

    public function cryptage($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }
    public function decryptage($password){
        return password_verify($password,$this->password);
    }
    public function logIn(){
        \App\Session::add('user',[
            'id'=>$this->id,
            'username'=>$this->username
        ]);
    }
    public function logOut(){
        \App\Session::remove('user');
    }


}