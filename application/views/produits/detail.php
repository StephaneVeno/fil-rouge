<!--juste pour comblé un peu le vide sans toucher a la bdd, se basée QUE sur le neuf pour le panier-->
<?php $elemS = rand(0,3); ?>
<?php $elemP = round($detail->PRO_PRIX_ACHAT*25/100,2);?>
<?php $elemR = 'refLorem';?>

<div class="row col-12 m-0 p-0 wrap-detail">
	<nav class="row col-12 m-0 pl-0 pr-0 titre-detail fil-arianne" aria-label="Breadcrumb">
		<ul>
			<li>
				<a class="text-center link-arianne" href=""><?php echo $detail->CAT_LIBELLE;?>&nbsp;</a>
			</li>
			<li>
				<span class="text-center text-light">&gt;&nbsp;</span>
			</li>
			<li>
				<span class="text-center text-light">Todo : Subcat</span>
			</li>
			<li>
				<span class="text-center text-light">&gt;&nbsp;</span>
			</li>
			<li>
				<span class="c-custom"><?php echo $detail->PRO_LIBELLE;?></span>
			</li>
		</ul>
	</nav>

	<figure class="row p-0 m-auto">
		<img src="<?php echo base_url() ;?>assets/img/produits/listes/<?php echo $detail->PRO_SLUG;?>.<?php echo $detail->PRO_PHOTO;?>" alt="<?php echo $detail->PRO_LIBELLE;?>" title="<?php echo $detail->PRO_LIBELLE;?>" class="img-fluid m-3">
	</figure>

	<div class="row col-12 p-0 m-0 wrap-detail-desc">
		<p class="col-10 offset-1 p-2 my-0 c-custom"><?php echo $detail->PRO_LIBELLE;?></p>
		<div class="row col-12 m-0 p-0">
			<div class="col-md-12 col-lg-5 offset-lg-1 bg-light-0 p-3 my-4 mr-lg-4">
				<p>Description du produit&nbsp;:</p>
				<p class=""><?php echo $detail->PRO_DESCRIPTION; ?></p>
			</div>
			<div class="col-md-12 col-lg-5 bg-light-0 p-3 my-4">
				<p> Fiche Technique&nbsp;:</p>
				<table class="table table-striped text-center">
					<tr>
						<th></th>
						<th>Neuf</th>
						<th>Bon etat</th>
						<th>Occasion</th>
					</tr>
					<tr>
						<th>Stock restant</th>
						<td><?php echo $detail->PRO_STOCK_PHYSIQUE;?></td>
						<td><?php echo $detail->PRO_STOCK_PHYSIQUE+=$elemS;?></td>
						<td><?php echo $detail->PRO_STOCK_PHYSIQUE+=$elemS;?></td>
					</tr>
					<tr>
						<th>Prix</th>
						<td><?php echo $detail->PRO_PRIX_ACHAT; ?>&nbsp;€</td>
						<td><?php echo $detail->PRO_PRIX_ACHAT-=$elemP; ?>&nbsp;€</td>
						<td><?php echo $detail->PRO_PRIX_ACHAT-=$elemP; ?>&nbsp;€</td>
					</tr>
					<tr>
						<th>Référence</th>
						<td><?php echo $detail->PRO_REF;?></td>
						<td><?php echo $elemR?></td>
						<td><?php echo $elemR?></td>
					</tr>
				</table>
			</div>			
		</div>


	</div>

</div>