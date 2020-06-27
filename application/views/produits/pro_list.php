<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered">
        <tbody>
            <tr class="table-active row text-center">
                <th class="col-2" id="tableNameCommande">Commande</th>
                <th class="col-1">id</th>
                <th class="col-1" id="tableNameReference">Référence</th>
                <th class="col-1" id="tableNameLibelle">Libellé</th>
                <th class="col-3" id="tableNameDescription">Description</th>
                <th class="col-1">prix</th>
                <th class="col-1">Stock</th>
                <th class="col-2" id="tableNameApercue">Aperçue</th>
            </tr>
            <?php foreach ($data as $pro) { ?>
            <tr class="table-active row">
                <td class="col-2">
                    <a href="<?php echo site_url("produits/ajout");?>" class="btn btn-dark col-11 m-1"> Ajouts</a>
                    <a href="<?php echo site_url("produits/modif");?>" class="btn btn-dark col-11 m-1"> Modifiez</a>
                    <a href="<?php echo site_url("produits/del");?>" class="btn btn-dark col-11 m-1"> Suppression</a></td>
                <td class="col-1"><?php echo $pro->PRO_ID ;?></td>
                <td class="col-1"><?php echo $pro->PRO_REF ;?></td>
                <td class="col-1">
                    <textarea disabled="disabled" name="" id="" class="col-auto">
                        <?php echo $pro->PRO_LIBELLE ;?>
                    </textarea>
                </td>
                <td class="col-3">
                    <textarea disabled="disabled" name="" id="" class="col-auto">
                        <?php echo $pro->PRO_DESCRIPTION;?>
                    </textarea>
                </td>
                <td class="col-1"><?php echo $pro->PRO_PRIX_ACHAT ;?></td>
                <td class="col-1"><?php echo $pro->PRO_STOCK_PHYSIQUE ;?></td>
                <td class="col-2">
                    <img class="img-fluid" src="<?php echo base_url() ;?>assets/img/produits/listes/<?php echo $pro->PRO_SLUG;?>.<?php echo $pro->PRO_PHOTO;?>" alt="<?php echo $pro->PRO_LIBELLE ;?>">
                </td>
            </tr>
            <?php } ;?>

        </tbody>
    </table>

</div>

<div class="row admin-produits col-12 mx-auto">
    <?php foreach ($data as $pro) { ?>
    <div class="produits col-12 px-0 row">
        <h3 class="col-12 pl-5 py-2 m-0">Libellé&nbsp;:&nbsp;<?php echo $pro->PRO_LIBELLE ;?></h3>
        <figure class="col-4 m-0 p-0 row">
            <img class="col-12" src="<?php echo base_url() ;?>assets/img/produits/listes/<?php echo $pro->PRO_SLUG;?>.<?php echo $pro->PRO_PHOTO;?>" alt="<?php echo $pro->PRO_LIBELLE ;?>" title="<?php echo $pro->PRO_LIBELLE ;?>">
        </figure>
        <div class="info-produits col-8 my-3">
            <div class="info-tech col-12 row">
                <ul class="col-12 p-0 m-0 row d-block">
                    <li class="px-1 py-1 mb-1 ml-2">Identifiant relationnel&nbsp;:&nbsp;<?php echo $pro->PRO_ID;?></li>
                    <li class="px-1 py-1 mb-1 ml-2">Identifiant référence&nbsp;:&nbsp;<?php echo $pro->PRO_REF;?></li>
                    <li class="px-1 py-1 mb-1 ml-2">Prix TTC&nbsp;:&nbsp;<?php echo $pro->PRO_PRIX_ACHAT;?></li>
                    <li class="px-1 py-1 mb-1 ml-2">Stock physique&nbsp;:&nbsp;<?php echo $pro->PRO_STOCK_PHYSIQUE;?></li>
                </ul>
                <h3 class="col-12 py-1 px-0 my-1 mx-2">Description du produits&nbsp;:&nbsp;</h3>
                <p class="col-12 px-1 py-1 mb-1 ml-2 description-produits">
                    <?php echo $pro->PRO_DESCRIPTION;?>   
                </p>
            </div>
        </div>


    </div>
    <?php } ;?>
</div>

