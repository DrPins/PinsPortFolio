<?php 
require 'header.php';
?>
<br><br><br><br><br><br>
<h1> Merci</h1>
<?php
if (isset($_POST)){
	$nom = $_POST['nom'];
	$prenom  = $_POST['prenom'];
	$email = $_POST['email'];
	$pwd = sha1($_POST['password']);

/*var_dump($_POST);*/

$produit = $DB->requete('INSERT INTO Client (nom, prenom, email, password) VALUES ("'.$nom.'","'.$prenom.'","'.$email.'","'.$pwd.'")');
}

?>
<?php require 'footer.php' ;?>