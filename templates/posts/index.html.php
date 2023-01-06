
<?php foreach ($posts as $post) :  ?>

    <div class="post mt-3">
        <h3><?= $post["title"] ?></h3>
        <p><?= $post["content"] ?></p>
        <a href="post.php?id=<?= $post['id'] ?>" class="btn btn-success">Lire</a>
    </div>

<?php endforeach; ?>