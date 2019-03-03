<?php
require '../controllers/bankrollController.php';
session_start();
// Si l'utilisateur n'est pas connecté la page ne peut pas être affiché redirection vers l'accueil
if (!isset($_SESSION['id'])) {
  header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular-route.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.5/angular-animate.js"></script>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <title>Black Jack Counter</title>
</head>
<body id="fondblack">
  <div class="topnav" id="myTopnav">
    <a id="logoblackjack" href="../index.php" class="active"><img src="../assets/img/titre3.png" alt="blackjack"></a>
    <a href="#contact">Notre,Histoire</a>
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
  <div id="sound">
    <audio autoplay="false" id="beep" src="../assets/music/son2.mp3"></audio>
    <audio autoplay="false" id="beep" src="../assets/music/son2.ogg"></audio>
  </div>
  <div class="container-fluid">
    <div class="col-12">
      <div id="firstligne" class="text-center">
        <p id="margintitre" class="titrevaleur">+1</p>
        <button class="buttonpetitecarte carte2" onclick="JouerSon()"> <img src="../assets/img/2.png"></button>
        <button class="buttonpetitecarte carte3" onclick="JouerSon()"> <img src="../assets/img/3.png"></button>
        <button class="buttonpetitecarte carte4" onclick="JouerSon()"> <img src="../assets/img/4.png"></button>
        <button class="buttonpetitecarte carte5" onclick="JouerSon()"> <img src="../assets/img/5.png"></button>
        <button class="buttonpetitecarte carte6" onclick="JouerSon()"> <img src="../assets/img/6.png"></button>
      </div>
      <div class="text-center" id="alignementcounter1">
        <input type="text" id="carte2" class="counter1" value="32" readonly="readonly"></input>
        <input type="text" id="carte3" class="counter1" value="32" readonly="readonly"></input>
        <input type="text" id="carte4" class="counter1" value="32" readonly="readonly"></input>
        <input type="text" id="carte5" class="counter1" value="32" readonly="readonly"></input>
        <input type="text" id="carte6" class="counter1" value="32" readonly="readonly"></input>
      </div>
      <div id="secondligne" class="text-center">
        <p class="titrevaleur">0</p>
        <button class="buttonmoyennecarte carte7" onclick="JouerSon()"> <img src="../assets/img/7.png"></button>
        <button class="buttonmoyennecarte carte8" onclick="JouerSon()"> <img src="../assets/img/8.png"></button>
        <button class="buttonmoyennecarte carte9" onclick="JouerSon()"> <img src="../assets/img/9.png"></button>
      </div>
      <div class="text-center" id="alignementcounter1">
        <input type="text" id="carte7" class="counter1" value="32" readonly="readonly"></input>
        <input type="text" id="carte8" class="counter1" value="32" readonly="readonly"></input>
        <input type="text" id="carte9" class="counter1" value="32" readonly="readonly"></input>
      </div>
      <div id="thirdligne" class="text-center">
        <p class="titrevaleur mx-auto">-1</p>
        <button class="buttongrandecarte carteas" onclick="JouerSon()"> <img src="../assets/img/10.png"></button>
        <button class="buttongrandecarte carte10" onclick="JouerSon()"> <img src="../assets/img/11.png"></button>
        <button class="buttongrandecarte cartevalet" onclick="JouerSon()"> <img src="../assets/img/12.png"></button>
        <button class="buttongrandecarte cartedame" onclick="JouerSon()"> <img src="../assets/img/13.png"></button>
        <button class="buttongrandecarte carteroi" onclick="JouerSon()"> <img src="../assets/img/1.png"></button>
        <div class="text-center" id="alignementcounter1">
          <input type="text" id="carteas" class="counter1" value="32" readonly="readonly"></input>
          <input type="text" id="carte10" class="counter1" value="32" readonly="readonly"></input>
          <input type="text" id="cartevalet" class="counter1" value="32" readonly="readonly"></input>
          <input type="text" id="cartedame" class="counter1" value="32" readonly="readonly"></input>
          <input type="text" id="carteroi" class="counter1" value="32" readonly="readonly"></input>
        </div>
      </div>
      <div class="text-center">
        <input type="text" id="counter" value="0" readonly="readonly"></input>
        <img id="reset1"src="../assets/img/reset.png" type="submit" onclick="resetValues()">
        <div id="placementdeck">
          <ul class="segmented-control">
            <li class="segmented-control__item" onclick="deckCount1()">
              <input class="segmented-control__input" type="radio" value="1" name="option" id="option-1" checked>
              <label class="segmented-control__label" for="option-1">1</label>
            </li>
            <li class="segmented-control__item" onclick="deckCount2()">
              <input class="segmented-control__input" type="radio" value="2" name="option" id="option-2">
              <label class="segmented-control__label" for="option-2">2</label>
            </li>
            <li class="segmented-control__item" onclick="deckCount3()">
              <input class="segmented-control__input" type="radio" value="3" name="option" id="option-3" checked>
              <label class="segmented-control__label" for="option-3">3</label>
            </li>
            <li class="segmented-control__item" onclick="deckCount4()">
              <input class="segmented-control__input" type="radio" value="4" name="option" id="option-4" checked>
              <label class="segmented-control__label" for="option-4">4</label>
            </li>
            <li class="segmented-control__item" onclick="deckCount5()">
              <input class="segmented-control__input" type="radio" value="5" name="option" id="option-5" checked>
              <label class="segmented-control__label" for="option-5">5</label>
            </li>
            <li class="segmented-control__item" onclick="deckCount6()">
              <input class="segmented-control__input" type="radio" value="6" name="option" id="option-6" checked>
              <label class="segmented-control__label" for="option-6">6</label>
            </li>
            <li class="segmented-control__item" onclick="deckCount7()">
              <input class="segmented-control__input" type="radio" value="7" name="option" id="option-7" checked>
              <label class="segmented-control__label" for="option-7">7</label>
            </li>
            <li class="segmented-control__item" onclick="deckCount8()">
              <input class="segmented-control__input" type="radio" value="8" name="option" id="option-8" checked>
              <label class="segmented-control__label" for="option-8">8</label>
            </li>
          </ul>
        </div>
        <button id="greencolor" type="button" name="button"></button>
        <button id="redcolor" type="button" name="button"></button>
        <button id="blackcolor" type="button" name="button"></button>
        <button id="bluecolor" type="button" name="button"></button>
        <p></p>
        <?php if(isset($_SESSION['id'])) {
           ?>
        <form class="formulaire" action="" method="POST">
        <label id="bankroll" for="bankroll">Bankroll </label>
        <input id="inputnumber" type="number" name="bankroll"></input>
        <label id="pseudo" for="pseudo">pseudo</label>
        <input id="inputpseudo" type="text" name="pseudo" readonly="readonly" value="<?= $_SESSION['pseudo'] ?>"></input>
        <label id="id" for="id">id</label>
        <input id="inputid" type="text" name="id" readonly="readonly" value="<?= $_SESSION['id'] ?>"></input>
        <input type="submit" class="btn btn-success" name="submit" value="VALIDER"></input>
      </form>
    <?php } ?>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/son.js"></script>
</body>
</html>
