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
				<span class="text-center text-muted">&gt;&nbsp;</span>
			</li>
			<li>
				<span class="detail-libelle"><?php echo $detail->PRO_LIBELLE;?></span>
			</li>
		</ul>
	</nav>

	<div class="row col-12 p-0 m-0 wrap-detail-desc">
		<div class="row col-12 m-0 p-0">

			<div class="col-sm-12 col-lg-5 bg-light-0 p-3 my-4 text-center">
				<img src="<?php echo base_url() ;?>assets/img/produits/listes/<?php echo $detail->PRO_SLUG;?>.<?php echo $detail->PRO_PHOTO;?>" alt="<?php echo $detail->PRO_LIBELLE;?>" title="<?php echo $detail->PRO_LIBELLE;?>" class="img-fluid m-3">
			</div>

			<div class="col-sm-12 col-lg-6 bg-light-0 p-3 my-4 row">
				<div class="col-sm-11 offset-1 bg-light-0 p-3 my-4 mr-lg-4">
					<p>Description du produit&nbsp;:</p>
					<p class=""><?php echo $detail->PRO_DESCRIPTION; ?></p>
				</div>

				<div class="col-sm-11 offset-1 bg-light-0 p-3 my-4 detail-tech">
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
                <?php if(isset($_SESSION["client"]) && $_SESSION["client"] == true){ ?>
				<div class="col-sm-11 offset-1 bg-light-0 p-3 my-4 detail-tech">
					<?= form_open('produits/store'); ?>
						<input type="hidden" name="<?= $detail->PRO_ID ;?>">
						<input type="hidden" name="<?= $detail->PRO_PRIX_ACHAT;?>">
						<input type="hidden" name="<?= $detail->PRO_LIBELLE;?>">
						<input type="hidden" name="quantity">
						<input type="submit" value="Achetez" class="btn btn-success">
						<input type="submit" value="Précommandez" class="btn btn-dark" name="achat">
					<?= form_close(); ?>
				</div>
			<?php } else { ?>
				<div class="col-sm-11 offset-1 bg-light-0 p-3 my-4 detail-tech">
					<span>Vous devais être connectez pour achetez</span>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</div>