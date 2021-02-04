<?php
session_start();
require_once 'connectdb.php';
$id=$_SESSION['user']['connect_id'];
// var_dump($_GET);
// die();
$req = $bdd->prepare('SELECT account_amount as dollars, farm_id FROM account INNER JOIN farm on account.connect_id= farm.connect_id WHERE account.connect_id=? LIMIT 1');
$req->execute(array($_SESSION['user']['connect_id']));
$data = $req->fetch();
//var_dump($data);
//die();
$bank_id=
$loan= $_GET['amount'];
$useramount= $data['dollars'];

$newamount= $loan + $useramount;
$req=$bdd->prepare("INSERT INTO farmbank(farm_id, bank_id, bank_time) VALUES(?,?,?)");
$req->execute(array(
    intval($data['farm_id']), 
    intval($_GET['value']),
    time()));

// var_dump($newamount);
// die();
$req=$bdd->prepare("UPDATE account SET account_amount=? WHERE connect_id=?");
$req->execute(array($newamount, $_SESSION['user']['connect_id']));

header("Location:../game.php?id=$id");