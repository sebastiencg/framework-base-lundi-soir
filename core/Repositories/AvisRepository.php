<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Avis;

#[TargetEntity(entityName: Avis::class)]
class AvisRepository extends AbstractRepository
{
    public function newAvis(bool $avis,int $recetteId, int $userId){
        $sql="INSERT INTO `$this->tableName`(`liker`, `userId`, `recetteId`) VALUES (:liker,:userId,:recetteId)";
         $requette=$this->pdo->prepare($sql);
         $requette->execute([
             "liker"=>$avis,
             "userId"=>$userId,
             "recetteId"=>$recetteId
         ]);
         return $requette;
    }
    public function checkAvis( int $recetteId,int $userId){
        $sql="SELECT * FROM `$this->tableName` WHERE userId=:userId AND recetteId=:recetteId";
        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "userId"=>$userId,
            "recetteId"=>$recetteId
        ]);
        $requette->setFetchMode(\PDO::FETCH_CLASS,get_class($this->targetEntity));
        $query = $requette->fetch();


        return $query;
    }
    public function removeAvis(int $recetteId, int $userId)
    {
        //$sql="UPDATE `$this->tableName` SET `liker`=:avis  WHERE userId=:userId AND recetteId=:recetteId";
        $sql="DELETE FROM `$this->tableName` WHERE userId=:userId AND recetteId=:recetteId";

        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "userId"=>$userId,
            "recetteId"=>$recetteId
        ]);
        return $requette;
    }

}
