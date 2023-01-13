<?php

//penser aux bons require_once
require_once('core/Database/PDOMySQL.php');

$id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
    $id = $_GET['id'];
}
if($id){

//trouver le post pour verifier qu'il existe


    if($post){

        //deplacer dans un endroit mieux la methode de suppression et la déclencher

//        $query = $pdo->prepare('DELETE FROM posts WHERE id = :id') ;
//
//        $query->execute(['id'=>$id]);

    }

     // reparer ca la juste en dessous

    redirect('index.php');


}