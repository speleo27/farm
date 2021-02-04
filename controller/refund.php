<?php
session_start();
require_once 'connectdb.php';
$id=$_SESSION['user']['connect_id'];
$req = $bdd->prepare('SELECT account_amount FROM account WHERE connect_id=? LIMIT 1');
$req->execute(array($id));
$data = $req->fetch(PDO::FETCH_ASSOC);

$req2=$bdd->prepare("SELECT * FROM farmbank INNER JOIN farm on(farmbank.farm_id= farm.farm_id) INNER JOIN bank on(farmbank.bank_id= bank.bank_id) where farm.connect_id=? ");
$req2->execute(array($id));
$data2=$req2->fetchAll(PDO::FETCH_ASSOC);

// var_dump($data2);
// die();
$refund= $_GET['amount'];
$useramount= $data['account_amount'];
$newamount=  $useramount - $refund;

//supression de la ligne en base farmbank
$req=$bdd->prepare("DELETE * from farmbank Where farm_id=? AND bank_id=? time=?");
$req->execute(array($data2['farm_id'], $data2['bank_id'], $data2['bank_time']));


// mise a jour du montant sur le compte
$req=$bdd->prepare("UPDATE account SET account_amount=? WHERE connect_id=?");
$req->execute(array($newamount, $_SESSION['user']['connect_id']));

header("Location:../game.php?id=$id");