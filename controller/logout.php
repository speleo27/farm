<?php
session_start();
unset($_SESSION['user']['connect_email']);
session_destroy();
header('Location:../index.php');