<form method="post" enctype="multipart/form-data" action="?type=recette&action=create">
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
        <input type="file"  class="form-control" name="image"  accept="image/png, image/jprg, image/gif" ">
    </div>
    <div class="mb-3">
        <label for="recette" class="form-label">les instructions</label>
        <textarea class="form-control" name="recette" rows="3"></textarea>
    </div>
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
</form>