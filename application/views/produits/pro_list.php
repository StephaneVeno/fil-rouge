
<div class="row admin-produits col-12 ml-auto p-0">
    <?php foreach ($data as $pro) { ?>
    <div class="produits col-12 px-0 row bg-light">

        <div class="col-12 m-0 py-2 action row">
            <h3 class="col-sm-12 col-md-6 m-0">Libellé&nbsp;:&nbsp;<?php echo $pro->PRO_LIBELLE ;?></h3>
            <a href="<?php echo site_url("produits/ajout");?>" class="text-center col-sm-4 col-md-2"> Ajouts</a>
            <a href="<?php echo site_url("produits/modif");?>" class="text-center col-sm-4 col-md-2"> Modifiez</a>
            <a href="<?php echo site_url("produits/del");?>" class="text-center col-sm-4 col-md-2"> Suppression</a></td>
        </div>

        
        <figure class="col-sm-12 col-md-6 col-xl-4 m-0 p-0 row">
            <img class="p-0 m-auto" src="<?php echo base_url() ;?>assets/img/produits/listes/<?php echo $pro->PRO_SLUG;?>.<?php echo $pro->PRO_PHOTO;?>" alt="<?php echo $pro->PRO_LIBELLE ;?>" title="<?php echo $pro->PRO_LIBELLE ;?>">
        </figure>

        <div class="info-produits col-sm-12 col-md-6 col-xl-8 py-3 bg-dark">
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

