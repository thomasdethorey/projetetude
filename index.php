<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title>Blackjack</title>
</head>
<body>
	<div class="topnav" id="myTopnav">
		<a id="logoblackjack" href="index.php" class="active"><img src="assets/img/titre3.png" alt="blackjack"></a>
		<a href="#contact">Notre,Histoire</a>
		<a href="views/contact.php">Contact</a>
		<?php
		if(!isset($_SESSION['id'])){
			?>
			<a id="inscription" href="views/suscribe.php">Inscription</a>
			<a id="connexion" href="views/login.php">Connexion</a>
		<?php }else{?>
			<a href="views/blackjack.php">Logiciel</a>
			<a id="pseudocouleur" href="views/update.php"><?= $_SESSION['pseudo'] . ' '?></a>
			<a id="deconnexioncouleur" href="controllers/logout.php">Deconnexion</a>
		<?php } ?>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<img src="assets/img/fondniquel6.png" id="fondblackjack" alt="">
		</div>
	</div>
		<div class="row">
			<div class="col-md-12">
				<h1>Black Jack Counter</h1>
				<p id="texte2">BlackJack Counter est une application web entièrement gratuite permettant de compter les cartes au Blackjack d’après la technique de comptage «Hi-Low» crée par Harvey Dubner en 1963. Cette application web ne vous permettra pas de devenir millionnaire mais d’accroître très fortement les statistiques en votre faveur, autrement dit de gagner de l’argent plus souvent en jouant au Blackjack dans un casino en ligne.</p>
			</div>
		</div>
		<!-- <div id="rowlogiciel1" class="row">
			<div class="col-md-6 text-center">
<img id="logiciel1" src="assets/img/logiciel1.png" alt="">
			</div>
			<div class="col-md-6 text-center">
			<p id="textelogiciel1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>
		</div>
</div> -->
</div>
	<script>
	function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
		} else {
			x.className = "topnav";
		}
	}
	</script>
	<!-- <script type="text/javascript">document.oncontextmenu = new Function("return false");</script> -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="assets/js/son.js"></script>
</body>
</html>
