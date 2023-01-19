<?php

namespace Entity;
require_once ('core/Entity/AbstractEntity.php');
class Post extends AbstractEntity
{

    protected $tableName = "posts";

    private int $id;
    private string $title;
    private string $content;


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
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function insert(Post $post){
        $request = $this->pdo->prepare('INSERT INTO posts SET title = :title, content = :content');


        $request->execute([
            "title"=> $post->getTitle(),
            "content"=>$post->getContent()
        ]);
    }

    public function update(Post $post){
        $requete = $this->pdo->prepare('UPDATE posts SET content = :content, title= :title WHERE id = :id');
        $requete->execute([
            'id'=>$post->getId(),
            'content'=>$post->getContent(),
            'title'=>$post->getTitle()
        ]);
    }

}