<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\User;

#[TargetEntity(entityName: User::class)]
class UserRepository extends AbstractRepository
{
    public function newUser(object $user){

        $sql="INSERT INTO `$this->tableName`(`username`, `mail`, `password`) VALUES (:username,:mail,:password)";
        $requette=$this->pdo->prepare($sql);

        $requette->execute([
            "username"=>$user->getUsername(),
            "mail"=>$user->getMail(),
            "password"=>$user->getPassword()
        ]);

        return $requette;

    }
    public function findByMail(string $mail){
        $sql="SELECT * FROM $this->tableName WHERE mail= :mail";
        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "mail"=>$mail,
        ]);
        $requette->setFetchMode(\PDO::FETCH_CLASS,get_class($this->targetEntity));

        $reponse = $requette->fetch();

        return $reponse;
    }
}