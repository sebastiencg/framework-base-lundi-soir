<?php

// se connecter à la DB

//PDO
require_once ('pdo.php');

$request = $pdo->query("SELECT * FROM posts");

$posts = $request->fetchAll();

 //print_r($posts);

ob_start();
require_once ('templates/posts/index.html.php');

$pageContent = ob_get_clean();

require_once ('templates/base.html.php');




