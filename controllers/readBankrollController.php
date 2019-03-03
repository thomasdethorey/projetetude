<?php
session_start();
//On remplit la session avec les attributs de l'objet issus de l'hydratation
$_SESSION['id'] = $user->id;
$_SESSION['pseudo'] = $user->pseudo;
$_SESSION['bankroll'] = $user->bankroll;


 ?>
