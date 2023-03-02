<?php

// Enregistre une fonction d'autochargement de classes dans la pile d'autochargement des classes de PHP.
spl_autoload_register(
    function($className){
        // Remplace les caractères "\" de l'espace de noms de la classe par "/" pour obtenir le chemin vers le fichier de la classe.
        $className = str_replace("\\", "/", $className);

        // Inclut le fichier de la classe correspondant au chemin calculé.
        require_once "core/{$className}.php";
    }
);
