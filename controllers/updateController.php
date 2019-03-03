<?php
// Inclusion de ma classe database gérant ma connexion à ma bdd
require_once '../models/database.php';
// Inclusion de mon modèle users pour executer la méthode updateUser
require_once '../models/users.php';

// déclaration des regexs vérifiants les saisies du formulaire d'inscription
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
$regexPhone = '/^[0][1-9][0-9]{8}$/';
$regexBirthDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
$regexPseudo = '/^[a-z0-9]{3,16}$/';
$sucessUpdate = 'Votre compte à bien été mises à jour, veuillez vous reconnecter ';
//déclaration du tableau d'erreur
$formError = array();

//vérification des informations saisies après modification de l'utilisateur
if (isset($_POST['submit'])) {
  //on instancie l'objet User
  $updateUser = new User();
  $updateUser->id = $_SESSION['id'];
  //Vérification existence pseudo, test passage regex, pseudo valable alors stocker
  // dans $pseudo sinon message erreur
  if (!empty($_POST['pseudo'])) {
    if (preg_match($regexPseudo, $_POST['pseudo'])) {
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $updateUser->pseudo = $pseudo;
    } else {
      $formError['pseudo'] = 'La saisie est invalide ';
    }
  } else {
    $formError['pseudo'] = 'Veuillez indiquer votre pseudo ';
  }
  //Vérification existence lastname, test passage regex, lastname valable alors
  // stocker dans $lastname sinon message erreur
  if (!empty($_POST['lastname'])) {
    if (preg_match($regexName, $_POST['lastname'])) {
      $lastname = htmlspecialchars($_POST['lastname']);
      $updateUser->lastname = $lastname;
    } else {
      $formError['lastname'] = 'La saisie est invalide ';
    }
  } else {
    $formError['lastname'] = 'Veuillez indiquer votre nom ';
  }
  //Vérification existence firstname, test passage regex, firstname valable alors
  // stocker dans $firstname sinon message erreur
  if (!empty($_POST['firstname'])) {
    if (preg_match($regexName, $_POST['firstname'])) {
      $firstname = htmlspecialchars($_POST['firstname']);
      $updateUser->firstname = $firstname;
    } else {
      $formError['firstname'] = 'La saisie est invalide ';
    }
  } else {
    $formError['firstname'] = 'Veuillez indiquer votre prénom ';
  }
  //Vérification existence birthDate, test passage regex, birthDate valable alors
  // stocker dans $birthDate sinon message erreur
  if (!empty($_POST['birthdate'])) {
    if (preg_match($regexBirthDate, $_POST['birthdate'])) {
      $birthdate = htmlspecialchars($_POST['birthdate']);
      $updateUser->birthdate = $birthdate;
    } else {
      $formError['birthdate'] = 'La saisie est invalide ';
    }
  } else {
    $formError['birthdate'] = 'Veuillez indiquer votre date de naissance ';
  }

  //Vérification existence phone, test passage regex, phone valable alors
  // stocker dans $phone sinon message erreur
  if (!empty($_POST['phone'])) {
    if (preg_match($regexPhone, $_POST['phone'])) {
      $phone = htmlspecialchars($_POST['phone']);
      $updateUser->phone = $phone;
    } else {
      $formError['phone'] = 'La saisie est invalide ';
    }
  } else {
    $formError['phone'] = 'Veuillez indiquer votre numéro de téléphone ';
  }
  //Vérification existence mail, test passage regex, mail valable alors
  // stocker dans $mail sinon message erreur
  if (!empty($_POST['mail'])) {
    if (FILTER_VAR($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
      $mail = htmlspecialchars($_POST['mail']);
      $updateUser->mail = $mail;
    } else {
      $formError['mail'] = 'La saisie est invalide ';
    }
  } else {
    $formError['mail'] = 'Veuillez indiquer votre adresse email ';
  }

  if (count($formError) == 0) {
    // insertion des modifications saisies dans les champs dans la table utilisateurs
    if ($updateUser->updateUser()) {
      $newInfosUser = $updateUser->updateUser();
      $_SESSION ['pseudo'] = $newInfosUser->pseudo;
      $_SESSION ['lastname'] = $newInfosUser->lastname;
      $_SESSION ['firstname'] = $newInfosUser->firstname;
      $_SESSION ['birthdate'] = $newInfosUser->birthdate;
      $_SESSION ['mail'] = $newInfosUser->mail;
      $_SESSION ['phone'] = $newInfosUser->phone;
      $formError['submit'] = 'Votre compte à bien été mises à jour, veuillez vous reconnecter ';
      session_unset();
      header("Refresh: 3; url=../index.php");
    }
  }
}

if (isset($_POST['deleteAccount'])) {
  //on instancie l'objet User
  $user = new User();
  $user->id = $_SESSION['id'];
  $user->deleteUser();
  //destruction de la session
  session_destroy();
  header('location: ../index.php');
}
?>
