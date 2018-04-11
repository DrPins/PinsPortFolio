<?php require 'header.php';

if(isset($_SESSION['Auth']['valider']))
{
?>
<div class="recherche_produit">
<form></form>
<?php
if(isset($_GET['categorie']) || isset($_GET['couleur']) || isset($_GET['promotion']))
{
	
	if (isset($_GET['promotion'])){
		if (isset($_GET['couleur'])){
			if (isset($_GET['categorie'])){
			
			$produit = $DB->query('SELECT * FROM Produit WHERE promotion != 0 AND Couleur_id = '.$_GET['couleur'].' AND id IN (SELECT Produit_id FROM Possède where Categorie_id ='.$_GET['categorie'].')');
		

			}
			else{
				$produit = $DB->query('SELECT * FROM Produit WHERE promotion != 0 AND Couleur_id = '.$_GET['couleur']);
			}


		}
		else{
			if (isset($_GET['categorie'])){
			
			$produit = $DB->query('SELECT * FROM Produit WHERE promotion != 0 AND id IN (SELECT Produit_id FROM Possède where Categorie_id ='.$_GET['categorie'].')');
		

			}
			else{
				$produit = $DB->query('SELECT * FROM Produit WHERE promotion != 0');
			}


		}
	}
	else{
		if (isset($_GET['couleur'])){
			if (isset($_GET['categorie'])){
			
			$produit = $DB->query('SELECT * FROM Produit WHERE Couleur_id = '.$_GET['couleur'].' AND id IN (SELECT Produit_id FROM Possède where Categorie_id ='.$_GET['categorie'].')');
		

			}
			else{
				$produit = $DB->query('SELECT * FROM Produit WHERE Couleur_id = '.$_GET['couleur']);
			}


		}
		else{
			if (isset($_GET['categorie'])){
			
			$produit = $DB->query('SELECT * FROM Produit WHERE id IN (SELECT Produit_id FROM Possède where Categorie_id ='.$_GET['categorie'].')');
		

			}
			else{
				$produit = $DB->query('SELECT * FROM Produit ');
			}


		}

	}
	

	
}


else{
	$produit = $DB->query('SELECT * FROM produit'); 
}

/*echo '<br><pre id="var_dump">';

var_dump($produit);
echo '</pre><br>';*/
/*if(isset($_GET['couleur']) ){
	$produit = $DB->query('SELECT * FROM Produit WHERE Couleur_id = '.$_GET['couleur']);
	
}*/

?>

</div>
<div id="groupe_produit">

<div id="side_bar">
	<form id="formulaire_recherche" action="produits.php" method="get">
	<span id="recherche_horizontal">RECHERCHE </span><br>

		<input type="checkbox" name="promotion" value="1"> Promotions<br><br>

		<span>Categorie : </span><br>
	  	<!--<input type="checkbox" name="categorie" value="1"> Interieur<br>
  		<input type="checkbox" name="categorie" value="3"> Exterieur<br>-->
  		<input type="radio" name="categorie" value="7"> Fleur<br>
  		<input type="radio" name="categorie" value="9"> Plante<br>
  		<input type="radio" name="categorie" value="43"> Decoration<br><br>

  		<span>Couleur : </span><br>
	  	<input type="radio" name="couleur" value="1"> Noir<br>
  		<input type="radio" name="couleur" value="2"> Blanc<br>
  		<input type="radio" name="couleur" value="3"> Rouge<br>
  		<input type="radio" name="couleur" value="4"> Bleu<br>
  		<input type="radio" name="couleur" value="5"> Jaune<br>
  		<input type="radio" name="couleur" value="12"> Gris<br>
  		<input type="radio" name="couleur" value="14"> Brun<br>
  		<input type="radio" name="couleur" value="23"> Rose<br>
  		<input type="radio" name="couleur" value="34"> Violet<br>
  		<input type="radio" name="couleur" value="35"> Orange<br>
  		<input type="radio" name="couleur" value="45"> Vert<br>
  		<input type="radio" name="couleur" value="801"> Bois<br>
  		
  		<input type="reset">
  		<input type="submit" value="Rechercher">	

	</form>
	<br><br>
</div>

<?php 

foreach ($produit as $product){
	?>
		<?php $couleur = $DB->query('SELECT * from Couleur where id ='.$product->Couleur_id); ?>
		<div class="box_produit">
			<?php
			if ($product->promotion == 1){
				echo 
				'<span class="box_vignette"> 
				<a href="details.php?id='.$product->id.'"><img class="vignette_produit" src="images/produits/'.
				$product->image.'"></a></a></span><br>
				<a href="details.php?id='.$product->id.'" class="titre_produit">'.$product->nom.'</a><span id="label_promo">Promotion ! -30% </span><br>'.
				$couleur[0]->label.'<br>'.
				$product->conditionement.'<br><del>'.
				number_format($product->prix, 2).'</del> € <span id="new_price">'.number_format(($product->prix)*0.70, 2).'€ </span><br><br>
				<a class="btn_add addPanier" href="addpanier.php?id='.$product->id.'">Ajouter</a> <a class="btn_details" href="details.php?id='.$product->id.'">En savoir plus</a>';
			}

			elseif ($product->promotion == 2){
				echo 
				'<span class="box_vignette"> 
				<a href="details.php?id='.$product->id.'"><img class="vignette_produit" src="images/produits/'.
				$product->image.'"></a></a></span><br>
				<a href="details.php?id='.$product->id.'" class="titre_produit">'.$product->nom.'</a><span id="label_promo">Promotion ! -50% </span><br>'.
				$couleur[0]->label.'<br>'.
				$product->conditionement.'<br><del>'.
				number_format($product->prix, 2).'</del> € <span id="new_price">'.number_format(($product->prix)*0.50, 2).'€ </span><br><br>
				<a class="btn_add addPanier" href="addpanier.php?id='.$product->id.'">Ajouter</a> <a class="btn_details" href="details.php?id='.$product->id.'">En savoir plus</a>';
			}

			else{
				echo 
				'<span class="box_vignette"> 
				<a href="details.php?id='.$product->id.'"><img class="vignette_produit" src="images/produits/'.
				$product->image.'"></a></a></span><br>
				<a href="details.php?id='.$product->id.'" class="titre_produit">'.$product->nom.'</a><br>'.
				$couleur[0]->label.'<br>'.
				$product->conditionement.'<br>'.
				number_format($product->prix, 2).' € <br>'.'<br>
				<a class="btn_add addPanier" href="addpanier.php?id='.$product->id.'">Ajouter</a> <a class="btn_details" href="details.php?id='.$product->id.'">En savoir plus</a>';
			}
			?>
		</div>
	<?php

} ?>
<input type="button" name="test" id="test">
</div>
<?php
}
else{
	?>
	<div id="va_t_inscrire">
	Veuillez vous inscrire ou vous identifier pour accèder à cette page
	<br><br>
	<a class ="btn_sinscrire" href="inscription.php">S'inscrire</a> <a class ="btn_sinscrire" href="connexion.php">S'indentifier</a>
	</div>
	<?php
}

?>

<?php require 'footer.php' ;?>