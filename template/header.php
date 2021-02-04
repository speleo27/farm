<?php
require "controller/connectdb.php";
session_start();
if (isset($_SESSION['user'])) {
  $req = $bdd->prepare("SELECT last_connection FROM connect WHERE connect_id=? LIMIT 1 ");
  $req->execute(array($_SESSION['user']['connect_id']));
  $time = $req->fetch();

  $lastTime = $time['last_connection'];
  $actualTime = time();

  $newtime = $actualTime - $lastTime;

  // var_dump($lastTime);
  // var_dump($newtime);
  //var_dump($_SESSION);

  // mise a jour de dernier time
  $req = $bdd->prepare("UPDATE connect SET last_connection=? WHERE connect_id=?");
  $req->execute(array($actualTime, $_SESSION['user']['connect_id']));
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="bootstrap-5.0.0-beta1-dist\css\bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.0.0-beta1-dist\js\bootstrap.js"></script>
  <script src="bootstrap-5.0.0-beta1-dist\js\bootstrap.bundle.js"></script>

  <title>Groin-groin the game</title>
</head>

<body>
  <nav class="navbar navbar-light bg-light  d-flex align-items-end">

    <?php

    if ($_SERVER['SCRIPT_NAME'] != "/farm/createAccount.php" && $_SERVER['SCRIPT_NAME'] != "/farm/accountChange.php") {
      if (isset($_SESSION["user"])) {

        $req = $bdd->prepare('SELECT account_amount FROM account WHERE connect_id=? LIMIT 1');
        $req->execute(array($_SESSION['user']['connect_id']));
        $data = $req->fetch();

        $req2 = $bdd->prepare('SELECT farm_name FROM farm WHERE connect_id=? ');
        $req2->execute(array($_SESSION['user']['connect_id']));
        $data2 = $req2->fetch();
        $req3 = $bdd->prepare("SELECT last_connection FROM connect WHERE connect_id=?");
        $req3->execute(array($_SESSION['user']['connect_id']));
        $lastTime = $req3->fetch();
        //var_dump($lastTime);
        echo '
            <div class="float-right">
                <a href="accountChange.php?connect_id=' . $_SESSION['user']['connect_id'] . '" class="btn btn-outline-danger ml-2 mr-auto" type="button" >' . $_SESSION["user"]["connect_pseudo"] . '</a>
                <a href="game.php"class="btn btn-outline-success" >' . $data2['farm_name'] . '</a>
                <a href="dollars.php" class="btn btn-outline-success" >' . $data['account_amount'] . ' $</a>
                <button class="btn btn-outline-danger  ml-2 mr-auto " type="button" data-bs-toggle="modal" data-bs-target="#buildingModal">Batiment</button>
                <button class="btn btn-outline-danger  ml-2 mr-auto " type="button" data-bs-toggle="modal" data-bs-target="#TechModal">Technologie</button>
                <button class="btn btn-outline-danger  ml-2 mr-auto " type="button" data-bs-toggle="modal" data-bs-target="#animalModal">Animaux</button>
                <button class="btn btn-outline-danger  ml-2 mr-auto " type="button" data-bs-toggle="modal" data-bs-target="#foodModal">Nourriture</button>
                
              
                <button class="btn btn-outline-danger  ml-2 mr-auto " type="button" data-bs-toggle="modal" data-bs-target="#disconnectModal">Deconnexion</button>
            </div>';
      } else {
        echo '
    <button class="btn btn-outline-success ml-auto" type="button" data-bs-toggle="modal" data-bs-target="#connectModal">Connexion</button>';
      }
    }
    ?>

  </nav>
  <div>
    <figure>
      <audio hidden autoplay="false" id="groin">
        <source src="sound\cochon_2-2.mp3" type="audio/mpeg">
      </audio>
    </figure>
    <a href="index.php"><img src="./img/logo.png" alt="logo groin groin" width="15%" id="logo" onclick="playsound()"></a>
  </div>