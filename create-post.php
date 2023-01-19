<?php

use Entity\Post;

require_once ('core/App/Response.php');
require_once ('core/App/View.php');
require_once ('core/Entity/Post.php');




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



    $entityPost = new \Entity\Post();
    $entityPost->insert($post);


    App\Response::redirect();

}
App\View::render("posts/create", ["pageTitle"=>"nouveau post"]);

?>
