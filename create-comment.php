<?php
require_once ('librairies/tools.php');

$id = null;
if(!empty($_POST['id'])){
    $id = $_POST['id'];
}


$content = null;
if(!empty($_POST['content'])){
    $content = $_POST['content'];
}


if($id && $content){

    require_once ('pdo.php');

    $requetePost = $pdo->prepare('SELECT * FROM posts WHERE id=:id');
    $requetePost->execute(['id'=>$id]);
    $post = $requetePost->fetch();

        if(!$post){
            redirect('index.php');
        }

        $requeteComment = $pdo->prepare('INSERT INTO comments SET content = :content, post_id = :post_id');

        $requeteComment->execute([
            "content"=>$content,
            "post_id"=>$id
        ]);

        redirect("post.php?id=${id}");



}
