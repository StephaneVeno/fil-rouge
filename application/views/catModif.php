<div class="col-12">
    <div class="row">

        <!----------------------------------------- Formulaire ajouts--------------------------------------------->
        <div class=" container col-8">
            <div class="col-12">
                <fieldset class="row">
                    <legend>Modification d'une catégorie</legend>
                    <?= form_open_multipart("categories/catModif/" . $detail->CAT_ID, 'class="form_control"'); ?>
                    <div class="form-group text-center">
                        <label for="libelle" class="sr-only">Libellé</label>
                        <input type="text" id="libelle" name="libelle" class="form-control text-center" value="<?= $detail->CAT_LIBELLE ?>">
                        <br>
                        <label for="cat_cat" class="sr-only">Catégorie</label>
                        <select class="form-control" name="cat_cat" id="cat_cat">
                            <option disabled selected>Catégorie parente</option>
                            <?php
                            foreach ($select_cat as $row) {
                            ?>
                                <option value="<?= $row->cat_id ?>"><?= $row->cat_libelle ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    </form>
                    <div class="form-group text-center">
                        <input type="submit" id="modif" name="modif" value="Modifier cette catégorie">
                    </div>
                    <?= form_close(); ?>
                </fieldset>
            </div>
            <br>
        </div>
    </div>
</div>
<div class="text-center">
    <a href="<?php echo site_url("categories/cat_list"); ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" title="Retour à la page précédente">Retour à la page précédente</a>
</div>
<br>