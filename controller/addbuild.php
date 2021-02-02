<?php
session_start();
var_dump($_SESSION);
include '../class/Building.php';
//var_dump($_POST);

Building :: createBuilding($_POST['building']);
