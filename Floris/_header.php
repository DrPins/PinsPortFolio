<?php 
require 'db.class.php';
require 'panier.class.php';
$DB=new DB(); 
$panier=new panier($DB);//initialisation de la base de données
?>