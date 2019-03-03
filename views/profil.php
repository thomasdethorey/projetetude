<?php
require '../controllers/apprenantController.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../assets/css/styles3.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" ></script>
  <title>Inscription utilisateur</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a id="logoblackjack" href="../index.php" class="active"><img src="../assets/img/titre3.png" alt="blackjack"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="blackjack.php">Logiciel<span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Histoire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="contact.php">Contact</a>
        </li>
        <?php
        if(!isset($_SESSION['id'])){
          ?>
          <li class="nav-item">
            <a class="nav-link" id="inscription" href="inscription.php">Inscription</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="connexion" href="connexion.php">Connexion</a>
          </li>
        <?php }else{?>
          <a id="pseudocouleur" href="update.php"><?= $_SESSION['pseudo'] . ' '?></a>
          <a id="deconnexioncouleur" href="../controllers/logout.php">Deconnexion</a>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <h2 id="titre" class="col-md-12 text-center">Inscription BlackJack Counter<hr></h2>
    </div>
    <div id="margintop">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form method="post">
            <div class="form-item">
              <label class="police" for="pseudo"></label>
              <input type="text" class="form-control alert alert-success alert alert-success" name="pseudo" id="pseudo" placeholder="Insérez votre pseudo" <?= isset($pseudo) ? 'value="' . $pseudo . '"' : '' ?>/>
              <?php if (isset($formError['pseudo'])) { ?>
                <p  class="alert alert-danger"><?= $formError['pseudo']; ?><img src="../assets/img/croix2.png" alt="blackjack"></p>
              <?php } ?>
              <label class="police" for="lastname"></label>
              <input type="text" class="form-control alert alert-success" name="lastname" id="lastname" placeholder="Insérez votre nom" <?= isset($lastname) ? 'value="' . $lastname . '"' : '' ?>/>
              <?php if (isset($formError['lastname'])) { ?>
                <p  class="alert alert-danger"><?= $formError['lastname']; ?><img src="../assets/img/croix2.png" alt="blackjack"></p>
              <?php } ?>
              <label class="police" for="firstname"></label>
              <input type="text" class="form-control alert alert-success" name="firstname" id="firstname" placeholder="Insérez votre prénom" <?= isset($firstname) ? 'value="' . $firstname . '"' : '' ?>/>
              <?php if (isset($formError['firstname'])) { ?>
                <p  class="alert alert-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?><img src="../assets/img/croix2.png" alt="blackjack"></p>
              <?php } ?>
              <label class="police" for="password"></label>
              <input type="password" class="form-control alert alert-success" name="password" id="password" placeholder="Mot de passe" <?= isset($password) ? 'value="' . $password . '"' : '' ?>/>
              <?php if (isset($formError['password'])) { ?>
                <p  class="alert alert-danger"><?= isset($formError['password']) ? $formError['password'] : '' ?><img src="../assets/img/croix2.png" alt="blackjack"></p>
              <?php } ?>

            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-12">
            <input class="btn btn-success" type="submit" name="submit" id="submit" value="S'INSCRIRE"/>
            <p>
              <?php if (isset($formError['submit'])) { ?>
                <p  class="alert alert-warning"><?= isset($formError['submit']) ? $formError['submit'] : ' ' ?><img src="../assets/img/valide1.png" alt="blackjack"></p>
              <?php } ?>
            </div>
            <p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
  </html>
