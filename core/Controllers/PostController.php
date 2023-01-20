<?php

namespace Controllers;



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

    public function remove(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
            $id = $_GET['id'];
        }
        if($id){

            $post = $this->defaultEntity->findById($id);
        }

            if($post){

                $this->defaultEntity->delete($post);

            }

            // reparer ca la juste en dessous

           return $this->redirect();




    }

    public function create(){



        $title = null;
        $content=null;

        if( !empty($_POST['title'])){
            $title = $_POST['title'];
        }
        if( !empty($_POST['content'])){
            $content = $_POST['content'];
        }

        if($title && $content){

            $post = new Post();

            $post->setTitle($title);
            $post->setContent($content);




            $this->defaultEntity->insert($post);


            return $this->redirect();

        }
        return $this->render("posts/create", ["pageTitle"=>"nouveau post"]);
    }

    public function change(){
        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
            $id = $_GET['id'];
        }
        if($id){



            $post = $this->defaultEntity->findById($id);

            if(!$post){
                return $this->redirect();
            }

        }

        $id = null;
        $content = null;
        $title = null;

        if(!empty($_POST['contentUpdate'])){
            $content = $_POST['contentUpdate'];
        }if(!empty($_POST['titleUpdate'])){
            $title = $_POST['titleUpdate'];
        }if(!empty($_POST['idUpdate'])){
            $id = $_POST['idUpdate'];
        }

        if($content && $id && $title){



            $post = $this->defaultEntity->findById($id);

            $post->setTitle($title);
            $post->setContent($content);

            $this->defaultEntity->update($post);



            return $this->redirect('post.php?id='.$post->getId());



        }
        return $this->render("posts/update",
            ["post"=>$post,
                "pageTitle"=>"modifier le post"]);


    }



}