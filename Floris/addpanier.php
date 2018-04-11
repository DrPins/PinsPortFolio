<?php

require '_header.php';
$json= array('error'=>true);
if(isset($_GET['id'])){
	$product = $DB->query("SELECT * FROM produit WHERE id=:ids",array('ids'=>$_GET['id']));
	if(empty($product)){
		$json['message']= "ce produit n'existe pas";}
	
	$panier -> add($product[0]->id);
	$json['error']=false;
	$json['total']=$panier->total();
	$json['count']=$panier->count();
	$json['message']="Le produit a bien été ajouté au panier";}
else{
	$json['message']= "vous n'avez pas selectionné de produit à ajouter au panier";
	}
echo json_encode($json);

?>

