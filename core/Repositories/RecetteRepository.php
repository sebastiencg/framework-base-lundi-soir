<?php

namespace Repositories;

use Attributes\Table;
use Attributes\TargetEntity;
use Entity\Recette;

#[TargetEntity(entityName: Recette::class)]
class RecetteRepository extends AbstractRepository
{
    public function newRecette(string $titre,string $typeRecette,string $recette,string $date,string $heure){

        $sql="INSERT INTO `$this->tableName`(`titre`, `typeRecette`, `recette`,`date`,`heure`) VALUES (:titre,:typeRecette,:recette,:date,:heure)";
        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "titre"=>$titre,
            "typeRecette"=>$typeRecette,
            "recette"=>$recette,
            "date"=>$date,
            "heure"=>$heure,
        ]);

        return $requette;
    }
    public function update(int $id, string $titre,string $typeRecette,string $recette){
        $sql="UPDATE `$this->tableName` SET `titre`=:titre,`typeRecette`=:typeRecette,`recette`=:recette WHERE id=:id";
        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "id"=>$id,
            "titre"=>$titre,
            "typeRecette"=>$typeRecette,
            "recette"=>$recette
        ]);
        return $requette;
    }
}