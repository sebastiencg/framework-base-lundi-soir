<?php

namespace Entity;
require_once ('core/Entity/AbstractEntity.php');
class Post extends AbstractEntity
{

    protected $tableName = "posts";



    public function insert(string $title, string $content){
            $request = $this->pdo->prepare('INSERT INTO posts SET title = :title, content = :content');


                $request->execute([
                        "title"=> $title,
                        "content"=>$content
                ]);
    }



}