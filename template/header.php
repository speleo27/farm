<?php
require "controller/connectdb.php";
session_start();
//var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="bootstrap-5.0.0-beta1-dist\css\bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.0.0-beta1-dist\js\bootstrap.bundle.js"></script>
  <script src="bootstrap-5.0.0-beta1-dist\js\bootstrap.js"></script>
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

        $req2 = $bdd->prepare('SELECT farm_name FROM farm WHERE connect_id=? LIMIT 1');
        $req2->execute(array($_SESSION['user']['connect_id']));
        $data2 = $req2->fetch();

        echo '
            <div class="float-right">
                <a href="accountChange.php?connect_id=' . $_SESSION['user']['connect_id'] . '" class="btn btn-outline-danger ml-2 mr-auto" type="button" >' . $_SESSION["user"]["connect_pseudo"] . '</a>
                <a href="game.php"class="btn btn-outline-success" >' . $data2['farm_name'] . '</a>
                <a href="dollars.php" class="btn btn-outline-success" >' . $data['account_amount'] . ' $</a>
                <button class="btn btn-outline-danger  ml-2 mr-auto " type="button" data-bs-toggle="modal" data-bs-target="#buildingModal">Batiment</button>
                <button class="btn btn-outline-danger  ml-2 mr-auto " type="button" data-bs-toggle="modal" data-bs-target="#TechModal">Technologie</button>
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
    <iframe width="1280" height="720" src="https://www.youtube.com/embed/hJtaADkS28U" frameborder="0" style="display:none;"></iframe>
    </audio>
    <a href="index.php"><img src="./img/logo.png" alt="logo groin groin" width="15%" id="logo" onclick=""></a>
  </div>