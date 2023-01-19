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

        $items = $request->fetchAll(\PDO::FETCH_CLASS,get_class($this));
        return $items;
    }

    public function findById(int $id){
        $query= $this->pdo->prepare("SELECT * FROM $this->tableName WHERE id=:id");

        $query->execute(["id"=>$id]);

        $item = $query->fetch(\PDO::FETCH_CLASS,get_class($this));
        return $item;
    }



    public function delete(object $object){
        $query = $this->pdo->prepare("DELETE FROM $this->tableName WHERE id = :id") ;

        $query->execute(['id'=>$object->getId()]);
    }
}