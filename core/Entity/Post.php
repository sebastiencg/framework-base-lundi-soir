<?php

namespace Entity;
require_once ('core/Database/PDOMySQL.php');
class Post
{

    private \PDO $pdo;

     public function __construct(){
         $this->pdo = \Database\PDOMySQL::getPdo();
     }

    public function findAllPosts()
    {


        $request = $this->pdo->query("SELECT * FROM posts");

        $posts = $request->fetchAll();
        return $posts;
    }


    public function findPostById($id){
        $query= $this->pdo->prepare('SELECT * FROM posts WHERE id=:id');

        $query->execute(["id"=>$id]);

        $post = $query->fetch();
        return $post;
    }



}