<?php
require_once ('core/App/Response.php');
require_once ('core/App/View.php');
require_once ('core/Entity/Post.php');
require_once ('core/Entity/Comment.php');




$post_id = null;
$content=null;

if( !empty($_POST['post_id'])){
    $post_id = $_POST['post_id'];
}
if( !empty($_POST['content'])){
    $content = $_POST['content'];
}

if($post_id && $content){
    $entityPost = new \Entity\Post();

    $post = $entityPost->findById($post_id);

    if(!$post){ App\Response::redirect();   }

    $entityComment = new \Entity\Comment();
    $entityComment->insert($post_id, $content);

    App\Response::redirect("post.php?id=$post_id");



}