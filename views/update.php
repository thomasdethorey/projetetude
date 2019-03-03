<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("location: ../index.php");
}
require '../controllers/updateController.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/style5.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
  <title><?= $title ?></title>
</head>
<body>
  <div class="topnav" id="myTopnav">
    <a id="logoblackjack" href="../index.php" class="active"><img src="../assets/img/titre3.png" alt="blackjack"></a>
    <a href="#contact">Notre,Histoire</a>
    <a href="contact.php">Contact</a>
    <?php
    if(!isset($_SESSION['id'])){
      ?>
      <a href="suscribe.php">Inscription</a>
      <a href="login.php">Connexion</a>
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
    <h2 id="titre" class="col-md-12 text-center">Modification Profil <?= $_SESSION['pseudo']?><hr></h2>

    <div id="margintop">
      <div class="row justify-content-center">
        <div class="col-4">
          <form class="formulaire" action="update.php" method="post">
            <p>
              <label id="marginlabel" for="lastname">Nom</label>
              <input type="text" class="form-control alert alert-success color" name="lastname"  value="<?= $_SESSION['lastname'] ?>" />
              <?php if (isset($formError['lastname'])) { ?>
                <p class="alert alert-danger"><?= $formError['lastname']; ?></p>
              <?php } ?>
              <label for="firstname">Prénom</label>
              <input type="text" class="form-control alert alert-success color" name="firstname"  value="<?= $_SESSION['firstname'] ?>" />
              <?php if (isset($formError['firstname'])) { ?>
                <p class="alert alert-danger"><?= $formError['firstname']; ?></p>
              <?php } ?>
              <label for="birthdate">Naissance</label>
              <input type="date" class="form-control alert alert-success color" name="birthdate"  value="<?= $_SESSION['birthdate'] ?>" />
              <?php if (isset($formError['birthdate'])) { ?>
                <p class="alert alert-danger"><?= $formError['birthdate']; ?></p>
              <?php } ?>
              <button type="submit" name="deleteAccount" onclick="return confirm('Voulez vous vraiment supprimer votre compte ?')" class="btn btn-danger" id="deleteAccount">SUPPRIMER MON COMPTE</button>
              <p>
              </div>
              <div class="col-4">
                <label for="phone">Téléphone</label>
                <input type="text" class="form-control alert alert-success color" name="phone"  value="<?= $_SESSION['phone'] ?>" />
                <?php if (isset($formError['phone'])) { ?>
                  <p class="alert alert-danger"><?= $formError['phone']; ?></p>
                <?php } ?>
                <label for="mail">E-mail</label>
                <input type="text" class="form-control alert alert-success color" name="mail"  value="<?= $_SESSION['mail'] ?>" />
                <?php if (isset($formError['mail'])) { ?>
                  <p class="alert alert-danger"><?= $formError['mail']; ?></p>
                <?php } ?>
                <label for="pseudo">Pseudo</label>
                <input type="text" class="form-control alert alert-success color" name="pseudo"  value="<?= $_SESSION['pseudo'] ?>" />
                <?php if (isset($formError['pseudo'])) { ?>
                  <p class="alert alert-danger"><?= $formError['pseudo']; ?></p>
                <?php } ?>
                <a href=""><input type="submit" class="btn btn-success" name="submit" value="MODIFIER" /></a>
                <p>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-12">
                  <?php if (isset($formError['submit'])) { ?>
                    <p  class="alert alert-warning"><?= isset($formError['submit']) ? $formError['submit'] : ' ' ?><img src="../assets/img/valide1.png" alt="blackjack"></p>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
  </form>
  <!--Fin du formulaire de la modification du user-->
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/son.js"></script>
</body>
</html>
