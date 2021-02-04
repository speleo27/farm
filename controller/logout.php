<?php
require_once 'connectdb.php';
session_start();
$req=$bdd->prepare("UPDATE connect SET last_connection=? WHERE connect_id=? LIMIT 1");
$req->execute(array(time(),$_SESSION['user']['connect_id']));
unset($_SESSION['user']['connect_email']);
session_destroy();
header('Location:../index.php');