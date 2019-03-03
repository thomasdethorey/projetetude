<?php
// Inclusion de ma classe database gérant ma connexion à ma bdd
require_once '../models/database.php';
// Inclusion de mon modèle users pour executer la méthode connection
require_once '../models/users.php';

// déclaration des regexs vérifiants les saisies du formulaire de connexion
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
$regexPassword = '/^(?=.*[A-z])(?=.*[0-9])\S{4,25}$/';
$formError = array();
// isset determine si une variable est définie
// !empty determine si une variable est présente
// htmlspecialchars convertit les caractères spéciaux en entités HTML
if(isset($_POST['connect'])){
  if(!empty($_POST['mail'])) {
    if(preg_match($regexMail, $_POST['mail'])) {
      $mail = htmlspecialchars($_POST['mail']);
    }else{
      $formError['mail'] = 'La saisie de votre mail est invalide ';
    }
  }else{
    $formError['mail'] = 'Veuillez entrer un email ';
  }
  if(!empty($_POST['password'])) {
    if(preg_match($regexPassword, $_POST['password'])) {
      $password = $_POST['password'];
    }else{
      $formError['password'] = 'Veuillez vérifier votre mot de passe ';
    }
  }else{
    $formError['password'] = 'Veuillez entrer un mot de passe ';
  }
  //Si la comptabilisation du tableau d'erreur est égal à 0 alors ...
  if(count($formError) == 0) {
    //on instancie l'objet User
    $user = new User();
    $user->mail = $mail;
    if($user->connection()) {
      //la fonction php password_verify vérifie si le password correspond au hachage dans la base de donnée
      if(password_verify($password, $user->password)) {
        //la connexion se fait
        session_start();
        //On remplit la session avec les attributs de l'objet issus de l'hydratation
        $_SESSION['id'] = $user->id;
        $_SESSION['pseudo'] = $user->pseudo;
        $_SESSION['firstname'] = $user->firstname;
        $_SESSION['lastname'] = $user->lastname;
        $_SESSION['birthdate'] = $user->birthdate;
        $_SESSION['mail'] = $user->mail;
        $_SESSION['phone'] = $user->phone;
        $_SESSION['password'] = $user->password;
        $_SESSION['isConnect'] = true;
        // l'utilisateur est redirigé vers la page d'accueil
        header('location: ../index.php');
      }else{
        // Message d'erreur connexion
        $formError['errorConnect'] = 'Le mot de passe ou le pseudonyme est incorrect ';
      }
    }else{
      //  Message d'erreur connexion
      $formError['errorConnect'] = 'Le mot de passe ou le pseudonyme est incorrect ';
    }
  }
}
