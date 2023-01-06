<form action="" method="post">
    <input type="hidden" name="idUpdate" value="<?= $post['id']?>">
    <input type="text" name="titleUpdate" value="<?= $post['title'] ?>" id="">
    <input type="text" name="contentUpdate" value="<?= $post['content'] ?>" id="">
    <button type="submit" class="btn btn-success">update</button>

</form>