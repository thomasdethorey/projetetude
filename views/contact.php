<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular-route.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular-animate.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style2.css">
	<title>Blackjack</title>
</head>
<body>
	<div class="topnav" id="myTopnav">
		<a id="logoblackjack" href="../index.php" class="active"><img src="../assets/img/titre3.png" alt="blackjack"></a>
		<a href="#contact">Histoire</a>
		<a href="contact.php">Contact</a>
		<?php
		if(!isset($_SESSION['id'])){
			?>
			<a id="inscription" href="suscribe.php">Inscription</a>
			<a id="connexion" href="login.php">Connexion</a>
		<?php }else{?>
			<a href="blackjack.php">Logiciel</a>
			<a id="pseudocouleur" href="update.php"><?= $_SESSION['pseudo'] . ' '?></a>
			<a id="deconnexioncouleur" href="../controllers/logout.php">Deconnexion</a>
		<?php } ?>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div id="formcenter" class="col-md-12">
				<p>Contact<hr/></p>
				<form class="" action="index.php" method="post">
					<label for="lastName"></label>
					<input class="positiontel" name="lastName" placeholder="Nom" /><br>
					<label for="email"></label>
					<input class="positiontel" name="email" placeholder="Email" /><br>
					<label for="phone"></label>
					<input class="positiontel" name="phone" placeholder="Téléphone" /><br>
					<textarea id="message" name="comment" form="usrform" placeholder="Message"></textarea><br>


					<input  id="changebutton" type="submit" value="ENVOYER" />
				</form>
				<div id="test1" class="col-12">
					<!-- <img src="../assets/img/fondniquel6.png" id="fondblackjack" alt=""> -->
				</div>
			</div>
		</div>
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
	<script type="text/javascript">document.oncontextmenu = new Function("return false");</script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="../assets/js/script.js"></script>
	<script src="../assets/js/son.js"></script>
</body>
</html>
