<?php require 'header.php';
$top_envoyer=0;
if (isset($_POST['Envoyer'])) {
	$top_envoyer=1;
}


?>
<br><br><br><br><br>
<h3>Inscription</h3>
<br><br>
<form method="post" action="validation.php" id="registration_form">
	<fieldset id="form_inscription">
		
	<span class="error" id="error_nom">test</span><br><input type="text" name="nom" id="nom" class="champs" placeholder="Nom"><br>
	<span class="error" id="error_prenom"></span><br> <input type="text" name="prenom" id="prenom" class="champs" placeholder="Prénom"><br>
	<span class="error" id="error_email"></span><br> <input type="email" name="email" id="email" class="champs" placeholder="E-mail"><br>
	<span class="error" id="error_pwd"></span> <br><input type="password" name="password" id="password" class="champs" placeholder="Mot de passe"><br>
	<span class="error" id="error_pwd2"></span> <br><input type="password" name="password2" id="password2" class="champs" placeholder="Confirmation du mot de passe"><br><br>
		

	<input type="submit" name="S'inscrire" class="btn">
	</fieldset>

</form>



<?php 

require 'footer.php' ;

?>
