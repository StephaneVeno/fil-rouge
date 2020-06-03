<div class="tableau table-responsive">
    <table class="table table-striped table-hover table-bordered">

        <h1 class="text-dark titre-liste text-center py-3 m-0">Pour ajouter un nouveau Personnel</h1>
        <a class="m-3" href="<?= site_url('personnels/persAjouts/');?>">
            <button class="btn btnordi offset-xs-6 offset-md-6 offset-lg-6 col-auto">
                <i class="fas fa-pencil-alt"></i> Ajouts
            </button>
        </a>

	<h1 class="text-dark titre-liste text-center py-3 m-0">Liste du personnel</h1>
            <thead>
                <tr>
                    <td>Supprimer</td>
                    <td>Modifier</td>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Service</td>
                    <td>E-mail</td>
                    <td>Matricule</td>
                    <td>Coéfficient</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($personnel as $row)
                    {
                 ?>
                        <tr class="table-active">
                            <td class="text-center d-sm-none btnportable"><a href="<?= site_url('personnels/persAjouts/'.$row->PER_ID);?>"><button class="btn btnpers"><i class="fas fa-pencil-alt"></i> Ajouts</button></a></td>
                            <td class="text-center"><a href=<?php echo site_url('personnels/persDel/'.$row->PER_ID)?>><button class="btn btnpers "><i class='fas fa-pencil-alt'></i> Supprimer</button></a></td>
                            <td class="text-center"><a href=<?php echo site_url('personnels/persModif/'.$row->PER_ID)?>><button class="btn btnpers "><i class='fas fa-pencil-alt'></i> Modification</button></a></td>
                            <td data-label="ID :"><?php echo $row->PER_ID ?></td>
                            <td data-label="Nom :"><?php echo $row->PER_NOM ?></td>
                            <td data-label="Prenom :"><?php echo $row->PER_PRENOM ?></td>
                            <td data-label="Service :"><?php echo $row->PER_SERVICE ?></td>
                            <td data-label="Mail :"><?php echo $row->PER_EMAIL ?></td>
                            <td data-label="Matricule :"><?php echo $row->PER_MATRICULE ?></td>
                            <td data-label="Coefficient :"><?php echo $row->PER_COEFICIENT ?></td>
                        </tr>
                <?php
                     }
                ?>
            </tbody>
        </table>
</div>
