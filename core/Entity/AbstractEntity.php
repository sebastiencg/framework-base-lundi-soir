<?php

namespace Entity;
require_once ('core/Database/PDOMySQL.php');

class AbstractEntity
{
    protected $tableName ;

    protected \PDO $pdo;

    public function __construct(){
        $this->pdo = \Database\PDOMySQL::getPdo();
    }

    public function findAll()
    {

        $request = $this->pdo->query("SELECT * FROM $this->tableName");

        $posts = $request->fetchAll();
        return $posts;
    }

    public function findById(int $id){
        $query= $this->pdo->prepare("SELECT * FROM $this->tableName WHERE id=:id");

        $query->execute(["id"=>$id]);

        $comment = $query->fetch();
        return $comment;
    }


    public function delete(int $id){
        $query = $this->pdo->prepare("DELETE FROM $this->tableName WHERE id = :id") ;

        $query->execute(['id'=>$id]);
    }
}