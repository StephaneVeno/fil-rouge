<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Piano</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($Piano as $row) : ?>
                    <tr class="table-active">
                        <td data-label="GuitBass"><?= $row->PRO_LIBELLE ?></td>
                        <td data-label="Description"><?= $row->PRO_DESCRIPTION ?></td>
                        <td ><img class="p-0 m-auto" src="<?php echo base_url() ;?>assets/img/produits/listes/<?php echo $row->PRO_SLUG;?>.<?php echo $row->PRO_PHOTO;?>" alt="<?php echo $row->PRO_LIBELLE ;?>"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
</div>
