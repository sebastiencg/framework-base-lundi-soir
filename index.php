<?php

require_once ('core/App/View.php');
require_once ('core/Entity/Post.php');

$postEntity = new \Entity\Post();



$posts = $postEntity->findAllPosts();

 //print_r($posts);

App\View::render("posts/index", [
    "posts"=>$posts,
    "pageTitle"=>"accueil du blog"
]);




