<?php
require_once ('librairies/tools.php');




$title = null;
$content=null;

if( !empty($_POST['title'])){
    $title = $_POST['title'];
}
if( !empty($_POST['content'])){
    $content = $_POST['content'];
}

if($title && $content){


require_once ('pdo.php');

    $request = $pdo->prepare('INSERT INTO posts SET title = :title, content = :content');


    $request->execute([
            "title"=> $title,
            "content"=>$content
    ]);

    redirect('index.php');

}
render("posts/create", ["pageTitle"=>"nouveau post"]);

?>
