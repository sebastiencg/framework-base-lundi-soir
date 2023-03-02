<?php

namespace App;
/**
 * Classe abstraite qui implémente l'interface userInterface et fournit des fonctions de sécurité pour les utilisateurs.
 */
abstract class Secutity implements userInterface
{    /** @var int L'identifiant de l'utilisateur. */
    protected int $id;

    /** @var string Le nom d'utilisateur de l'utilisateur. */
    protected string $username;

    /** @var string L'adresse e-mail de l'utilisateur. */
    protected string $mail;

    /** @var string Le mot de passe de l'utilisateur crypté. */
    protected string $password;

    /**
     * Fonction qui utilise la fonction password_hash() de PHP pour crypter le mot de passe de l'utilisateur.
     *
     * @param string $password Le mot de passe de l'utilisateur.
     * @return string Le mot de passe crypté.
     */
    public function cryptage($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * Fonction qui utilise la fonction password_verify() de PHP pour vérifier si le mot de passe fourni correspond au mot de passe stocké.
     *
     * @param string $password Le mot de passe fourni.
     * @return bool Vrai si les mots de passe correspondent, faux sinon.
     */
    public function decryptage($password){
        return password_verify($password, $this->password);
    }

    /**
     * Fonction qui stocke les informations de l'utilisateur dans la session.
     */
    public function logIn(){
        \App\Session::add('user', [
            'id' => $this->id,
            'username' => $this->username
        ]);
    }

    /**
     * Fonction qui supprime les informations de l'utilisateur de la session.
     */
    public function logOut(){
        \App\Session::remove('user');
    }
}
