<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\CommentaireRepository;

#[Table(name: "commentaire-recettte")]
#[TargetRepository(repositoryName: CommentaireRepository::class)]
class Commentaire extends AbstractEntity
{
    private int $id;

    private string $commentaire;
    private int $recetteId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCommentaire(): string
    {
        return $this->commentaire;
    }

    /**
     * @param string $commentaire
     */
    public function setCommentaire(string $commentaire): void
    {
        $this->commentaire = $commentaire;
    }

    /***
     * @param int $recetteId
     */
    public function setRecetteId(int $recetteId): void
    {
        $this->recetteId = $recetteId;
    }

    /**
     * @return int
     */
    public function getRecetteId(): int
    {
        return $this->recetteId;
    }

}