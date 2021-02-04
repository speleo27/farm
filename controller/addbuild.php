<?php
session_start();
//var_dump($_SESSION);
include '../class/Building.php';
//var_dump($_POST);
$id= $_SESSION['user'];
Building :: createBuilding($_POST['building']);
header("Location:../game.php?id=$id");