<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <h1 class="text-dark titre-liste text-center py-3 m-0">Ajouter une nouvelle catégorie</h1>
        <a href="<?php echo site_url("clients/cliAjouts"); ?>">
                <button class="btn btnordi offset-xs-6 offset-md-6 offset-lg-6 col-auto">
                    <i class="fas fa-pencil-alt"></i> Ajouts
                </button>
        </a>
        <thead>
            <tr>
                <th>Modification</th>
                <th>Suppression</th>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Téléphone</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($select_cli as $row) : ?>
                <tr class="table-active">
                    <td class="text-center d-sm-none btnportable"><a href="<?php echo site_url("clients/cliAjouts/") . $row->CLI_ID; ?>" class="btn btnpers cv"><i class="fas fa-pencil-alt"></i>Ajouter</a>
                    <td class="text-center"><a href="<?php echo site_url("Clients/cliModif/") . $row->CLI_ID; ?>" class="btn btnpers cv">Modifier<i class="fas fa-pencil-alt"></i></a>
                    <td class="text-center">
                        <?= form_open("Clients/cliSuppr/" . $row->CLI_ID) ?>
                        <input type="submit" name="sup" id="sup" class="btn btnpers sup" value="Supprimer"><i class="fas fa-pencil-alt"></i>
                        <?= form_close(); ?>
                    </td>
                    <td data-label="ID :"><?= $row->CLI_ID ?></td>
                    <td data-label="Nom :"><?= $row->CLI_NOM ?></td>
                    <td data-label="Prénom :"><?= $row->CLI_PRENOM ?></td>
                    <td data-label="Mail :"><?= $row->CLI_MAIL ?></td>
                    <td data-label="Téléphone :"><?= $row->CLI_TEL ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="text-center">
    <a href="<?php echo site_url("admin/adminAccueil"); ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true" title="Retour à la page précédente">Retour à la page précédente</a>
</div>
<br>