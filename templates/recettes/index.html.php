<?php foreach ($reponses as $reponse) : ?>
    <div class="position-relative m-4">
        <h3><?= $reponse->getTitre() ?></h3>

        <a class="btn btn-primary btn btn-info position-absolute  start-100 translate-middle btn btn-sm btn-secondary rounded-pill" href="?type=recette&action=show&id=<?= $reponse->getId() ?>">
            information
        </a>
        <h4><?= $reponse->getTypeRecette() ?></h4>

        <p><?= $reponse->getRecette() ?></p>
        <p><strong>publié le <?= $reponse->getDate() ?> à <?= $reponse->getHeure() ?></strong></p>
    </div>
<?php endforeach;?>
