<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="templates/style/style.css">
    <title><?= $titrePage ?></title>
</head>
<body>
<div class="bg-success-subtle container-fluid">
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?type=home&action=index">home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?type=recette&action=index">all recette</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">nos recettes</a>
            <ul class="dropdown-menu bg-success-subtle">
                <li><a class="dropdown-item" href="?type=recette&action=dessert">dessert</a></li>
                <li><a class="dropdown-item" href="?type=recette&action=plat">plat</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?type=recette&action=create">ajoute ta recette</a>
        </li>
    </ul>
</div>
<br>
<div class="container">
    <?= $pageContent?>
</div>
<script>

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="templates/script/main.js"></script>
</body>
</html>