<?php
require_once ('librairies/tools.php');
$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}
if($id){

    require_once('pdo.php');

   $query= $pdo->prepare('SELECT * FROM posts WHERE id=:id');

   $query->execute(["id"=>$id]);

  $post = $query->fetch();

   if(!$post){
       redirect("index.php");
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

    require_once('pdo.php');

    $requete = $pdo->prepare('UPDATE posts SET content = :content, title= :title WHERE id = :id');
    $requete->execute([
            'id'=>$id,
            'content'=>$content,
        'title'=>$title
    ]);

    redirect('post.php?id='.$id);



}
render("posts/update", ["post"=>$post,"pageTitle"=>"modifier le post"]);

?>
