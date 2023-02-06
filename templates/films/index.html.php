<?php foreach ($films as $film) : ?>

    <hr>
    <h2><?=$film->getTitle() ?></h2>

    <p><strong><?= $film->getSynopsis() ?></strong></p>
    <a href="?type=film&action=show&id=<?= $film->getId() ?>" class="btn btn-primary">Voir</a>
    <hr>


<?php endforeach; ?>
