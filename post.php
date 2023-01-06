<?php

$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}
if($id){
    require_once ('librairies/tools.php');
    require_once('pdo.php');

   $query= $pdo->prepare('SELECT * FROM posts WHERE id=:id');

   $query->execute(["id"=>$id]);

  $post = $query->fetch();

  $requeteComments = $pdo->prepare('SELECT * FROM comments WHERE post_id=:post_id');

   $requeteComments->execute([
       "post_id"=>$id
   ]);

   $comments = $requeteComments->fetchAll();

   if(!$post){
       redirect('index.php');
   }

render("posts/post", [
    "post"=>$post,
    "comments"=>$comments,
    "pageTitle"=>$post['title']
]);
}
?>

