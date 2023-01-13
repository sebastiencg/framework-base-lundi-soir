<?php

require_once ('core/App/Response.php');
require_once ('core/App/View.php');
require_once ('core/Database/PDOMySQL.php');
require_once ('core/Entity/Post.php');
require_once ('core/Entity/Comment.php');


$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}


if($id){

    $postEntity = new \Entity\Post();

 $post = $postEntity->findById($id);



   if(!$post){
       App\Response::redirect();
   }

   $commentEntity = new \Entity\Comment();
   $comments =  $commentEntity->findAllByPostId($post['id']);


App\View::render("posts/post", [
                            "post"=>$post,
                            "comments"=>$comments,
                            "pageTitle"=>$post['title']
                        ]);
}



?>

