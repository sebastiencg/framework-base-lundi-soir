
<div class="post mt-3">
        <h3><?= $post['title'] ?></h3>
<p><?= $post['content'] ?></p>
<a href="delete-post.php?id=<?= $post['id'] ?>" class="btn btn-danger">supprimer</a>
<a href="update-post.php?id=<?= $post['id'] ?>" class="btn btn-warning">Update</a>

<a href="index.php" class="btn btn-success">retour</a>
</div>

// il faut faire un foreach sur la variable comments
