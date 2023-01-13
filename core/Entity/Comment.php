<?php

namespace Entity;

require_once ('core/Entity/AbstractEntity.php');


class Comment extends AbstractEntity
{

    protected $tableName = "comments";


    public function findAllByPostId(int $post_id){
        $query= $this->pdo->prepare('SELECT * FROM comments WHERE post_id=:post_id');

        $query->execute(["post_id"=>$post_id]);

        $comments = $query->fetchAll();
        return $comments;
    }




    public function insert(int $post_id, string $content){
        $request = $this->pdo->prepare('INSERT INTO comments SET post_id = :post_id, content = :content');


        $request->execute([
            "post_id"=> $post_id,
            "content"=>$content
        ]);
    }
}