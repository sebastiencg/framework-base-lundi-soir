<?php

require_once ('core/App/Response.php');
require_once ('core/App/View.php');
require_once ('core/Database/PDOMySQL.php');
require_once ('core/Entity/Post.php');


$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}


if($id){

    $postEntity = new \Entity\Post();

 $post = $postEntity->findPostById($id);

   if(!$post){
       App\Response::redirect();
   }

App\View::render("posts/post", [
                            "post"=>$post,
                            "pageTitle"=>$post['title']
                        ]);
}



?>

