<?php require 'header.php' ;?>
<?php

$json= array('error'=>true);
if(isset($_GET['id'])){
	$product = $DB->query("SELECT * FROM produit WHERE id=".$_GET['id']);
	$couleur = $DB->query('SELECT * from Couleur where id ='.$product[0]->Couleur_id);
}

			$promo = 0;
			$taux = 0 ;
			if ($product->promotion == 1){
				$promo = 0.70;
				$taux = 30;
			}
			elseif ($product->promotion == 2) {
				$promo = 0.50;
				$taux = 50;
			}
if ($promo == 0){

echo 
				'<div class="box_detail">
				<span> 
					<a href="details.php?id='.$product[0]->id.'"><img class="photo_produit" src="images/produits/'.$product[0]->image.'"></a>
				</span><br>
				<a href="details.php?id='.$product[0]->id.'" class="titre_produit">'.$product[0]->nom.'</a><br>'.
				$couleur[0]->label.'<br>'.
				$product[0]->conditionement.'<br>'.
				number_format($product[0]->prix, 2).' € <br>
				
				<a class="add1 addPanier" href="addpanier.php?id='.$product[0]->id.'">Ajouter au panier</a><br>
				<div class="box_description">
					<span id="titre_desc">Description</span>
					<br>
					<div id="para_desc">'.
				$product[0]->description.'
					</div>
				</div>


				</div>';}

else {
					echo 
				'<div class="box_detail">
				<span> 
					<a href="details.php?id='.$product[0]->id.'"><img class="photo_produit" src="images/produits/'.$product[0]->image.'"></a>
				</span><br>
				<a href="details.php?id='.$product[0]->id.'" class="titre_produit">'.$product[0]->nom.'</a><span id="label_promo">Promotion !  -'.$taux.'%</span><br>'.
				$couleur[0]->label.'<br>'.
				$product[0]->conditionement.'<br><del>'.
				number_format($product->prix, 2).'</del> € <span id="new_price">'.number_format(($product->prix)*0.50, 2).'€ </span><br>
				
				<a class="add1 addPanier" href="addpanier.php?id='.$product[0]->id.'">Ajouter au panier</a><br>
				<div class="box_description">
					<span id="titre_desc">Description</span>
					<br>
					<div id="para_desc">'.
				$product[0]->description.'
					</div>
				</div>


				</div>';
				}

?>

<?php require 'footer.php' ;?>