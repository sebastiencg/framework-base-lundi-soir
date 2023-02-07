<div class="position-relative m-4">
    <h3>commentaire</h3>
    <?php foreach ($commentaires as $commentaire): ?>

        <p class="bg-success-subtle">
        <div class="nav-item dropdown bg-success-subtle">
            <?= $commentaire->getCommentaire() ?>
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">plus</a>
            <ul class="dropdown-menu ">
                <li><a class="dropdown-item" href="#g">modifier</a></li>
                <li><a class="dropdown-item" href="#">supprimer</a></li>
            </ul>
        </div>
        </p>

    <?php endforeach; ?>
</div>