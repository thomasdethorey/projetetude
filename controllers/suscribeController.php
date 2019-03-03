<?php
// Inclusion de ma classe database gérant ma connexion à ma bdd
require_once '../models/database.php';
// Inclusion de mon modèle users pour executer de la méthode addUser
require_once '../models/users.php';

// déclaration des regexs vérifiants les saisies du formulaire d'inscription
$regexPseudo = '/^[a-z0-9]{3,16}$/';
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
$regexPhoneNumber = '/^0[1-68][0-9]{8}/';
$regexBirthDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
$regexPassword = '/^(?=.*[A-z])(?=.*[0-9])\S{4,25}$/';
//déclaration du tableau d'erreur
$formError = array();

if(isset($_POST['submit'])) {
  //on instancie l'objet User
  $user = new User();
  if(!empty($_POST['pseudo'])) {
    if(preg_match($regexPseudo, $_POST['pseudo'])) {
      $user->pseudo = htmlspecialchars($_POST['pseudo']);
      // Vérifie l'existence d'un pseudo avec la méthode checkIfPseudoExist
      if($user->checkIfPseudoExist()){
        $formError['pseudo'] = 'Le pseudo est déjà utilisé ';
      }
    }else{
      $formError['pseudo'] = 'Le pseudo doit contenir au minimum 3 cseulement les chiffres et lettres sont autorisés ';
    }
  }else{
    $formError['pseudo'] = 'Veuillez indiquer votre pseudo  ';
  }
  if(!empty($_POST['lastname'])) {
    if(preg_match($regexName, $_POST['lastname'])) {
      $user->lastname = htmlspecialchars($_POST['lastname']);
    }else{
      $formError['lastname'] = 'La saisie de votre nom est invalide ';
    }
  }else{
    $formError['lastname'] = 'Veuillez indiquer votre nom ';
  }
  if(!empty($_POST['firstname'])) {
    if(preg_match($regexName, $_POST['firstname'])) {
      $user->firstname = htmlspecialchars($_POST['firstname']);
    }else{
      $formError['firstname'] = 'La saisie de votre prénom est invalide ';
    }
  }else{
    $formError['firstname'] = 'Veuillez indiquer votre prénom ';
  }
  if(!empty($_POST['birthdate'])) {
    if(preg_match($regexBirthDate, $_POST['birthdate'])) {
      $user->birthdate = htmlspecialchars($_POST['birthdate']);
    }else{
      $formError['birthdate'] = 'La saisie de votre date de naissance est invalide ';
    }
  }else{
    $formError['birthdate'] = 'Veuillez indiquer votre date de naissance ';
  }
  if(!empty($_POST['phone'])) {
    if(preg_match($regexPhoneNumber, $_POST['phone'])) {
      $user->phone = htmlspecialchars($_POST['phone']);
    }else{
      $formError['phone'] = 'La saisie de votre N° de téléphone est invalide ';
    }
  }else{
    $formError['phone'] = 'Veuillez indiquer votre N° de téléphone ';
  }
  if(!empty($_POST['mail'])) {
    if(preg_match($regexMail, $_POST['mail'])) {
      $user->mail = htmlspecialchars($_POST['mail']);
      // Vérifie l'existence d'une adresse mail avec la méthode checkIfEmailExist
      if($user->checkIfEmailExist()){
        $formError['mail'] = 'L\'adresse email est déjà utilisée ';
      }
    }else{
      $formError['mail'] = 'La saisie de votre mail est invalide ';
    }
  }else{
    $formError['mail'] = 'Veuillez indiquer votre mail ';
  }
  if(!empty($_POST['password']) && !empty($_POST['password2']) && $_POST['password'] == $_POST['password2']) {
    if(preg_match($regexPassword, $_POST['password'])) {
      $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      //si les champs sont vides ou s'il ne sont pas identiques affichage d'un message d'erreur
    }else{
      $formError['password'] = 'Veuillez vérifier votre mot de passe ';
      $formError['password2'] = 'Les mots de passes sont différents ';
    }
  }
  if(!empty($_POST['password']) && !empty($_POST['password2'])) {
    $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    //si les champs sont vides ou s'il ne sont pas identiques affichage d'un message d'erreur
  }else{
    $formError['password'] = 'Veuillez indiquer votre mot de passe ';
    $formError['password2'] = 'Veuillez indiquer votre mot de passe ';
  }
  if(count($formError) == 0) {
    if($user->addUser()) {
      $formError['submit'] = 'Votre compte à bien été crée, vous pouvez désormais vous connecter ';
    }
  }
}
