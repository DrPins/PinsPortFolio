<?php session_start();
?>
<?php 
require '_header.php';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Floris</title>
	<link rel="stylesheet" type="text/css" href="monstyle.css">
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.2/jquery.scrollTo.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-localScroll/1.4.0/jquery.localScroll.min.js"></script>

	<script type="text/javascript" src="script.js"></script>
	
</head>
<body>
<header>
	<nav>
		<div id="top_nav_barre">
		<span><a href="index.php"><img class="icone_nav_barre" src="images/icone_fleur_noir.png"></a></span>
		<span><a href="produits.php"><img class="icone_nav_barre" src="images/logofloris_noir.png"></a></span>
		<span><a href="panier.php"><img class="icone_nav_barre" src="images/icone_panier2_noir.png"></a></span>
		<?php
		if(!isset($_SESSION['Auth'])){
		echo '<span><a href="inscription.php"><img class="icone_nav_barre" src="images/icone_inscription_noir.png"></a></span>';}
		

		if (isset($_SESSION['Auth']['email']) && $_SESSION['Auth']['email']=='admin@admin.com'){?>

			<span><a href="admin.php"><img class="icone_admin_nav_barre" src="images/icone_admin_noir.png"></a></span>
		<?php
		;}
		?>

		
		<?php if (isset($_SESSION['Auth'])) {?>
			<span id="log_mail"><?php echo $_SESSION['Auth']['email']; ?></span>
			<span><a href="logout.php"><img class="icone_login_nav_barre" src="images/icone_logout_noir.png"></a></span><?php
		}
		else
			{?>
			<span><a href="connexion.php"><img class="icone_login_nav_barre" src="images/icone_login_noir.png"></a></span><?php
		
			}?>
		
		</div>

		<span id="drop_menu_fleur">
		<a class="scrollTo" href="index.php" ><img class="drop_icone_nav_barre" src="images/icone_fleur_noir.png"></a>
		<a class="scrollTo" data-scrollTo="section2" href="#section2"><img class="drop_icone_nav_barre" src="images/icone_carte_noir.png"></a>
		<a class="scrollTo" data-scrollTo="section3" href="#section3"><img class="drop_icone_nav_barre" src="images/icone_horloge_noir.png"></a>


		<a class="scrollTo" data-scrollTo="section4" href="#section4"><img class="drop_icone_nav_barre" src="images/icone_contact_noir.png"></a>


		</span>
		
	</nav>
</header>
