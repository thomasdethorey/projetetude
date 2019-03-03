<?php
// Inclusion de ma classe database gérant ma connexion à ma bdd
require_once '../models/database.php';
// Inclusion de mon modèle users pour executer la méthode displayProfil
require_once '../models/users.php';
//on instancie l'objet User
$user = new User();
$userList = $user->displayProfil();
