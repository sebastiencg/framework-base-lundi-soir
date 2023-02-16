<div class="position-relative m-4">
    <h3><?= $reponse->getTitre() ?></h3>
    <h4><?= $reponse->getTypeRecette() ?></h4>
    <h6>publier le <?=$reponse->getDate() ?> à <?=$reponse->getHeure() ?> par <?=$user->getUsername() ?></h6>
    <button class="btn btn-danger btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">supprimer</button>
    <a class="btn btn-warning" href="?type=recette&action=change&id=<?= $reponse->getId() ?>"> modifier</a>
    <br>
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <img src="http://localhost/framework-base-lundi-soir/images/<?= $reponse->getImage() ?>" height="250px" alt="illustration">
            </div>
        </div>
    </div>
    <br>
    <p><?= $reponse->getRecette() ?></p>
</div>
<div class="position-relative m-4">
    <form method="post" action="?type=commentaire&action=create&recetteId=<?= $reponse->getId() ?>">
        <div class="input-group input-group-sm mb-3">
            <span class="input-group-text" id="inputGroup-sizing-sm">commentaire</span>
            <input type="text" name="commentaire" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            <input type="hidden" name="id_recette" value="<?= $reponse->getId() ?>">
        </div>
        <div class="mb-3">
            <button class="buttonCreate" type="submit">
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <svg class="svgCreate" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                        </svg>
                    </div>
                </div>
                <span class="spanCreate">envoyer</span>
            </button>
        </div>
    </form>
</div>
<div class="container">
    <?php
     require_once ("templates/commentaires/commentaire.html.php");
    ?>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">supprimer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                voulez vous vraiment supprimer
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    non
                </button>
                <button type="button" class="btn btn-primary">
                    <a href="?type=recette&action=remove&id=<?= $reponse->getId() ?>" style="text-decoration: none ; color: white">
                        oui
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->