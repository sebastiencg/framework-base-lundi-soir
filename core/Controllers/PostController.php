<?php

namespace Controllers;

require_once ('core/App/View.php');
require_once ('core/Entity/Post.php');
require_once ('core/App/Response.php');
require_once ('core/Entity/Comment.php');
require_once ('core/Controllers/AbstractController.php');


use Entity\Comment;
use Entity\Post;

class PostController extends AbstractController
{

    protected string $defaultEntityName = Post::class;



    public function index(){

        return $this->render("posts/index", [
            "posts"=>$this->defaultEntity->findAll(),
            "pageTitle"=>"accueil du blog"
        ]);


    }

    public function show()
    {
        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
            $id = $_GET['id'];
        }

        if(!$id){ return $this->redirect(); }




        $post = $this->defaultEntity->findById($id);

        if(!$post){ return $this->redirect();}

        $commentEntity = new Comment();

        $comments = $commentEntity->findAllByPost($post);

       return $this->render("posts/post", [
            "post"=>$post,
            "comments"=>$comments,
            "pageTitle"=>$post->getTitle()
        ]);




    }

    public function remove(){}

    public function create(){}

    public function change(){}



}