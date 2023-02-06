<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Avis;
use Entity\Film;

#[TargetEntity(entityName: Avis::class)]
class AvisRepository extends AbstractRepository
{

    public function findAllByFilm(Film $film){

        $query = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE film_id = :film_id");
        $query->execute([
            "film_id"=>$film->getId()
        ]);

        $avis = $query->fetchAll(\PDO::FETCH_CLASS,get_class($this->targetEntity));

        return $avis;

    }

    public function insert(Avis $avis){

        $query = $this->pdo->prepare("INSERT INTO {$this->tableName} SET content = :content, film_id = :film_id");

        $query->execute([
            "content"=>$avis->getContent(),
            "film_id"=>$avis->getFilmId()
        ]);
        return $this->pdo->lastInsertId();

    }

}