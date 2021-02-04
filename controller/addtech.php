<?php

session_start();
// var_dump($_POST);
// die();
require_once '../class/Tech.php';

$id= $_SESSION['user'];

Tech::buyTech($_POST['techno']);

header("Location:../game.php?id=$id");