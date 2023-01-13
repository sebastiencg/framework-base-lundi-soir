<?php
require_once ('core/App/Response.php');
require_once ('core/App/View.php');
require_once ('core/Database/PDOMySQL.php');




$title = null;
$content=null;

if( !empty($_POST['title'])){
    $title = $_POST['title'];
}
if( !empty($_POST['content'])){
    $content = $_POST['content'];
}

if($title && $content){

// déplacer ce truc la au bon endroit et le déclencher

//
//    $request = $pdo->prepare('INSERT INTO posts SET title = :title, content = :content');
//
//
//    $request->execute([
//            "title"=> $title,
//            "content"=>$content
//    ]);

    App\Response::redirect();

}
App\View::render("posts/create", ["pageTitle"=>"nouveau post"]);

?>
