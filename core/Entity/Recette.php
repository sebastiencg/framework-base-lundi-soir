<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\RecetteRepository;
use Repositories\UserRepository;

#[Table(name: "recette")]
#[TargetRepository(repositoryName: RecetteRepository::class)]
class Recette extends AbstractEntity
{
    private int $id;
    private string $titre;
    protected string $typeRecette;

    protected string $recette;

    protected string $date;
    protected string $heure;
    protected string $image;
    protected int $user;
    protected int $user_id;
    protected int $compteurLike;

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
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getTypeRecette(): string
    {
        return $this->typeRecette;
    }

    /**
     * @param string $typeRecette
     */
    public function setTypeRecette(string $typeRecette): void
    {
        $this->typeRecette = $typeRecette;
    }

    /**
     * @return string
     */
    public function getRecette(): string
    {
        return $this->recette;
    }

    /**
     * @param string $recette
     */
    public function setRecette(string $recette): void
    {
        $this->recette = $recette;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getHeure(): string
    {
        return $this->heure;
    }

    /**
     * @param string $heure
     */
    public function setHeure(string $heure): void
    {
        $this->heure = $heure;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     */
    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }
    public function setUser(User $user){
        $this->setUserId($user->getId());
    }

    public function getUser(){
        $userRepo = new UserRepository();
        return $userRepo->findById($this->user_id);
    }

    /**
     * @return int
     */
    public function getCompteurLike(): int
    {
        return $this->compteurLike;
    }

    /**
     * @param int $compteurLike
     */
    public function setCompteurLike(int $compteurLike): void
    {
        $this->compteurLike = $compteurLike;
    }

}