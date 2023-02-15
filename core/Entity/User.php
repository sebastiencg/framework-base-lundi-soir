<?php

namespace Entity;

use App\Secutity;
use Attributes\Table;
use Attributes\TargetEntity;
use Attributes\TargetRepository;
use Repositories\UserRepository;

#[Table(name: "user")]
#[TargetRepository(repositoryName: UserRepository::class)]
class User extends Secutity
{
    protected int $id;
    protected string $username;
    protected string $mail;
    protected string $password;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $this->cryptage($password);
    }



}