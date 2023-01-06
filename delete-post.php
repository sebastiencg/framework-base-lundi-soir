<?php
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
        header("Location: index.php");
    }

   $query = $pdo->prepare('DELETE FROM posts WHERE id = :id') ;

    $query->execute(['id'=>$id]);

    header('Location: index.php');


}