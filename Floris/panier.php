<?php require 'header.php';
$ids = array_keys($_SESSION['panier']);
if(isset($_SESSION['Auth']['valider']))
{
			?>
			<br><br><br>
			<div>
			<?php 




			if (empty($ids))
			{
				$prod_pannier=array();
				echo "<br><br><h3>Votre pannier est vide</h3>";
			}
			else{

				$prod_pannier=$DB->query('SELECT * FROM Produit WHERE id IN ('.implode(',', $ids).')');?>
				


				<table id="table_panier"><tr>
							<th></th>
							<th>Produit</th>
							<th>Conditionnement</th>
							<th>Quantité</th>
							<th>Prix unitaire</th>
							
							</tr>
							
				<?php foreach ($prod_pannier as $product){?>
				
					<div class="item_panier">
						<?php
						$promo = 0;
						if ($product->promotion == 1){
							$promo = 0.70;
						}
						elseif ($product->promotion == 2) {
							$promo = 0.50;
						}
						
						if ($promo != 0){
							echo 
							'<tr>
							<td class="panier_produit_image"><a href="details.php?id='.$product->id.'"><img class="vignette_produit_panier" src="images/produits/'.$product->image.'"></a></td>
							<td class="panier_produit_nom">'.$product->nom.'</td>
							<td class="panier_produit_conditionnement">'.$product->conditionement.'</td>
							<td class="panier_produit_quantite">'.$_SESSION['panier'][$product->id].'</td>
							<td class="panier_produit_prix"><del>'.
							number_format($product->prix, 2).'</del> € <span id="new_price">'.number_format(($product->prix)* $promo, 2).'€ </span></td>
							<td class="panier_produit_supp">'.'<a class="del" href="panier.php?delPanier='.$product->id.'">Supprimer</a></td>';
						}
						else{
							echo 
							'<tr>
							<td class="panier_produit_image"><a href="details.php?id='.$product->id.'"><img class="vignette_produit_panier" src="images/produits/'.$product->image.'"></a></td>
							<td class="panier_produit_nom">'.$product->nom.'</td>
							<td class="panier_produit_conditionnement">'.$product->conditionement.'</td>
							<td class="panier_produit_quantite">'.$_SESSION['panier'][$product->id].'</td>
							<td class="panier_produit_prix">'.
							number_format($product->prix, 2).' €</td>
							<td class="panier_produit_supp">'.'<a class="del" href="panier.php?delPanier='.$product->id.'">Supprimer</a></td>';
						}
						?>
						<br>
					</div>
					<?php
				}	 ?>
							<tr>
							<th></th>
							<th>TOTAL</th>
							<th></th>
							<th><?php echo array_sum($_SESSION['panier']); ?></th>
							<th><?php echo number_format($panier->total(),2);
							?></th>
							</tr>

				</table>
			
			}

			</div>
			<?php
}}
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