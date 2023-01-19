<?php

require_once('core/Entity/Post.php');
require_once ('core/App/Response.php');

$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}
if($id){

//trouver le post pour verifier qu'il existe

    $entityPost = new \Entity\Post();

    $post = $entityPost->findById($id);



    if($post){

            $entityPost->delete($post);

    }

     // reparer ca la juste en dessous

    App\Response::redirect();


}