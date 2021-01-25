<?php
require "controller/connectdb.php";
session_start(); 
//var_dump($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <title>Groin-groin the game</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <form class="container-fluid justify-content-start">
    <?php
   
    if($_SERVER['SCRIPT_NAME'] != "/template/createAccount.php"){
     if(isset($_SESSION["user"])){
    echo'
    
    <a href="accountChange.php?connect_id='.$_SESSION['user']['connect_id'].'" class="btn btn-outline-danger ml-2 mr-auto" type="button" >'. $_SESSION["user"]["connect_pseudo"].'</a>

    <button class="btn btn-outline-danger  ml-2 mr-auto" type="button" data-bs-toggle="modal" data-bs-target="#disconnectModal">Deconnexion</button>';
    }else{
        echo'
    <button class="btn btn-outline-success ml-auto" type="button" data-bs-toggle="modal" data-bs-target="#connectModal">Connexion</button>';
    }
}
    ?>
  </form>
</nav>
<div>
    <img src="../img/logo.png" alt="logo groin groin" width="15%">
</div>

<!-- Modal connection -->
<div class="modal fade" id="connectModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="controller/ctrllogin.php" method="POST">
        <input type="email" placeholder="email" name="connect_email">
        <input type="password" placeholder="Mot de Passe" name="passwordSend">
        <p>Pas encore inscrit?<a href="createAccount.php">Créé un compte</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary" name='btnconnect'>Se Connecter</button>
      </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="disconnectModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Connexion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="controller/logout.php" method='post'>
        
        <p>Vous allez être déconnecter</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="submit" class="btn btn-primary">Déconnexion</button>
      </div>
      </form>
    </div>
  </div>
</div>