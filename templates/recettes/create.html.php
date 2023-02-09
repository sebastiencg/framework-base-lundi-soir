<form method="post" action="?type=recette&action=create">
    <div class="mb-3">
        <label for="titre" class="form-label">nom de la recette </label>
        <input type="text" class="form-control" name="titre"  placeholder="nom de la recette">
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="typeRecette">type de recette</label>
        <select class="form-select" name="typeRecette">
            <option selected></option>
            <option value="dessert">dessert</option>
            <option value="plat">plat</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">illustration</label>
        <input type="file" formenctype="multipart/form-data" class="form-control" name="image"  accept="image/png, image/jprg, image/gif" ">
    </div>
    <div class="mb-3">
        <label for="recette" class="form-label">les instructions</label>
        <textarea class="form-control" name="recette" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-info">envoyer</button>
    </div>
</form>