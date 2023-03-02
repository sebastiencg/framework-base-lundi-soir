<H2>ma Doc</H2>
<br>
<div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary">
    <h4>
        notre index.php appel:
    </h4>
    <ul>
        <li>
            <p>La class kernel lis l’url, prépare le controller et sa méthode</p>
            <i>il a besoin d’un type et d'une action pour renvoyer un controller et sa méthode sinon il pointe par défaut vers homeController méthode index().</i>
            <br>
            <img src="imageDoc/url.png" width="1000px" alt="illustration">
        </li>
        <li>
            <p>autoloading qui requice once le controller préparé par le kernel .</p>
        </li>
    </ul>
</div>
<div class="p-3 mb-2 bg-success-subtle text-emphasis-primary">
    <h4>
        les controllers ont besoin de
    </h4>
    <ul>
        <li>
            un DefaultEntity et du nom de l’entity demandé
        </li>
    </ul>
    <img src="imageDoc/defaultentity.png" width="1000px" alt="illustration">
    <ul>
        <li>
            c est ici que l’on fait appel au methode demander dans l’url et que l'on écrit quelque algorithme de sécurité
            <br>
            <i> "Les données des formulaires sont aussi traitée ici"</i>
        </li>
        <li>
            les  méthode font appel à des repository et les envoient des données à traiter
        </li>
        <li>
            il return soit render, soit des redirect (les redirect renvoi un tableau qui va être transformé en url et ouvrir cette url) (les render en besoin du nom d’un template et d’un tableau de valeur de la DB qui vont transformer en variable)
        </li>
    </ul>
    <img src="imageDoc/methode.png" width="1000px" alt="illustration">
</div>
<div class="p-3 mb-2 bg-warning-subtle text-emphasis-primary">
    <h4>
        les repository ont besoin de
    </h4>
    <ul>
        <li>
            TargetEntity et du nom de l’entity demandé
        </li>
    </ul>
    <img src="imageDoc/targetentity.png" width="1000px" alt="illustration">
    <ul>
        <li>
            c’est ici que l'on interagit avec la DB
        </li>
        <li>
            il traite les données envoyées par les controllers dans des méthodes et return des valeurs de la base de données
        </li>
    </ul>
    <img class="img-fluid" src="imageDoc/methoderepository.png" width="1000px" alt="illustration">
</div>
<div class="p-3 mb-2 bg-danger-subtle text-emphasis-primary">
    <h4>
        les Entity ont besoin
    </h4>
    <ul>
        <li>
            TargetRepository et du nom du repository
        </li>
    </ul>
    <img src="imageDoc/tarRepository.png" width="1000px" alt="illustration">
    <ul>
        <li>
            du nom de la table de la de la base de donne
        </li>
    </ul>
    <img src="imageDoc/tablename.png" width="600px" alt="illustration">
    <ul>
        <li>
            c’est ici que sont créés les proprietes que vont renvoyer la DB et les getters et des setters pour certain
        </li>
    </ul>
    <img src="imageDoc/propriete.png"  alt="illustration">
</div>
<div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary">
    <h4>
        la dataBase
    </h4>
    <ul>
        <li>
            c’est ici que le lien est créé entre DB est le Framework il return pdo
        </li>
    </ul>
    <img src="imageDoc/pdo.png" alt="illustration">
</div>
<div class="p-3 mb-2 bg-success-subtle text-emphasis-primary">
    <h4>
        Attribute
    </h4>
    <ul>
        <li>
            c’est ici que les câblages ces fonts entre (les repository, les entity, controller)
        </li>
    </ul>
</div>
<div class="p-3 mb-2 bg-dark-subtle text-emphasis-primary">
    <h4>
        chaque nouvelle class doit extend leur Abstract
    </h4>
    <img src="imageDoc/extend.png" width="1000px" alt="illustration">
</div>
<div class="p-3 mb-2 bg-danger-subtle text-emphasis-primary">
    <h4>
        templates c’est ici que sont stock tous les pages html, js et css du framework
    </h4>
    <img src="imageDoc/templates.png" alt="illustration">
</div>
