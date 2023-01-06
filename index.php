<?php

require_once ('librairies/tools.php');
require_once ('pdo.php');

$request = $pdo->query("SELECT * FROM posts");

$posts = $request->fetchAll();

 //print_r($posts);

render("posts/index", [
    "posts"=>$posts,
    "pageTitle"=>"accueil du blog"
]);




