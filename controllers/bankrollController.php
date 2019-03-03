<?php
// Inclusion de ma classe database gérant ma connexion à ma bdd
require_once '../models/database.php';
// Inclusion de mon modèle addBankrolls pour executer de la méthode addUser
require_once '../models/bankroll.php';

//déclaration du tableau d'erreur

  //déclaration du tableau d'erreur
  $formError = array();

  if(isset($_POST['submit'])) {


    //on instancie l'objet User
    $addBankroll = new Bankroll();
    if(!empty($_POST['bankroll'])) {
      if($_POST['bankroll']) {
        $addBankroll->bankroll = htmlspecialchars($_POST['bankroll']);
      }else{
        $formError['bankroll'] = 'La saisie de votre bankroll est invalide ';
      }
    }
    if(!empty($_POST['pseudo'])) {
      if($_POST['pseudo']) {
        $addBankroll->pseudo = htmlspecialchars($_POST['pseudo']);
      }else{
        $formError['pseudo'] = 'La saisie de votre pseudo est invalide ';
      }
    }

    if(!empty($_POST['id'])) {
      if($_POST['id']) {
        $addBankroll->id = htmlspecialchars($_POST['id']);
      }else{
        $formError['id'] = 'La saisie de votre id est invalide ';
      }
    }



    if(count($formError) == 0) {
      if($addBankroll->addBankroll()) {
        $formError['submit'] = 'Votre compte à bien été crée, vous pouvez désormais vous connecter ';
      }
    }
  }
