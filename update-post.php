<?php

require_once "core/Entity/Post.php";
require_once "core/App/View.php";
require_once "core/App/Response.php";
$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}
if($id){

    $entityPost = new \Entity\Post();

    $post = $entityPost->findById($id);

   if(!$post){
       App\Response::redirect();
   }

}

$idUpdate = null;
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

   $entityPost = new \Entity\Post();

   $post = $entityPost->findById($id);

   $post->setTitle($title);
   $post->setContent($content);

   $entityPost->update($post);



    App\Response::redirect('post.php?id='.$post->getId());



}
App\View::render("posts/update",
    ["post"=>$post,
    "pageTitle"=>"modifier le post"]);

?>
