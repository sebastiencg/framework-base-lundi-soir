<?php

namespace Entity;

require_once ('core/Entity/AbstractEntity.php');


class Comment extends AbstractEntity
{

    protected $tableName = "comments";

    private int $id;
    private string $content;
    private int $post_id;


    public function findAllByPost(Post $post){
        $query= $this->pdo->prepare('SELECT * FROM comments WHERE post_id=:post_id');

        $query->execute(["post_id"=>$post->getId()]);
        $query->setFetchMode(\PDO::FETCH_CLASS, get_class($this));

        $comments = $query->fetchAll();
        return $comments;
    }




    public function insert(Comment $comment){
        $request = $this->pdo->prepare('INSERT INTO comments SET post_id = :post_id, content = :content');


        $request->execute([
            "post_id"=> $comment->getPostId(),
            "content"=>$comment->getContent()
        ]);
    }

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

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->post_id;
    }

    /**
     * @param int $post_id
     */
    public function setPostId(int $post_id): void
    {
        $this->post_id = $post_id;
    }
}