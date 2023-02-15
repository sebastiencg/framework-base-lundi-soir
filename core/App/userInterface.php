<?php

namespace App;

interface userInterface
{
    public function getId();

    public function getUsername();
    public function setUsername(string $username);
    public function getMail();
    public function setMail(string $mail);
    public function getPassword();
    public function setPassword(string $password);


}