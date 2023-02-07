<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Commentaire;

#[TargetEntity(entityName: Commentaire::class)]
class CommentaireRepository extends AbstractRepository
{
    public function findAllById(int $RecetteId){
        $sql="SELECT * FROM `$this->tableName` WHERE id_recette=:id";
        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "id"=>$RecetteId
        ]);
        $requette->setFetchMode(\PDO::FETCH_CLASS,get_class($this->targetEntity));
        $reponses=$requette->fetchAll();
        return $reponses;
    }
}