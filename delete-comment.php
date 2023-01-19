<?php


require_once('core/Entity/Comment.php');
require_once ('core/App/Response.php');

$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}
if($id){

    $entityComment = new \Entity\Comment();

    $comment = $entityComment->findById($id);

    if($comment){
        $entityComment->delete($comment);
    }

    App\Response::redirect('post.php?id='.$comment->getPostId());

}
