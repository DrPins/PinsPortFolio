<?php
require 'header.php' ;
if (isset($_POST) && !empty($_POST['email']) && !empty($_POST['password'])){
	
	$email = $_POST['email'];
	$password = sha1($_POST['password']);

	$login = $DB->query('SELECT id FROM client WHERE email= "'.$email.'" AND password = "'.$password.'"');
	$count = count($login);
	$erreur='';
	if($count == 1){
		$verif = $DB->query('SELECT valider FROM client WHERE email= "'.$email.'" AND password = "'.$password.'"AND valider != 0');
		$count2 = count($verif);

		if($count2 == 1){
			$_SESSION['Auth']= array(
			'email' => $email,
			'password' => $password,
			'valider'=> 1



			);
			$erreur = 'Vous êtes connecté';
		
		}
		else{
			$erreur = "Le compte n'a pas encore été validé";
		}
	}
	else{
		$erreur = "Erreur d'identifiant ou de mot de passe";
	}

}

;?>
<br>
<br><br>
<h3>Connexion</h3>
<br><br>
<form method="post" action="" id="registration_form">
	<fieldset id="form_inscription">
	<span><?php if (isset($erreur)){echo $erreur; }?></span><br>
	<span class="error" id="error_login"></span>
	<span class="error" id="error_email"></span><br> <input type="email" name="email" id="email" class="champs" placeholder="E-mail"><br>
	<span class="error" id="error_pwd"></span> <br><input type="password" name="password" id="password" class="champs" placeholder="Mot de passe"><br><br>

	<input type="submit" name="S'inscrire" class="btn" value="Se connecter">
	</fieldset>

</form>



<?php 


require 'footer.php' ;?>

