
<div class="post mt-3">
        <h3><?= $post['title'] ?></h3>
<p><?= $post['content'] ?></p>
<a href="delete-post.php?id=<?= $post['id'] ?>" class="btn btn-danger">supprimer</a>
<a href="update-post.php?id=<?= $post['id'] ?>" class="btn btn-warning">Update</a>

<a href="index.php" class="btn btn-success">retour</a>
</div>



<hr>

<form method="post" class="form" action="create-comment.php">
    <input class="form-control"  type="text" name="content" placeholder="add a comment">
    <input name="id" class="form-control" type="hidden" value="<?= $post['id'] ?>">
    <button class="btn btn-success" type="submit">Send</button>
</form>