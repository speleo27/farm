<?php

//var_dump($_SESSION['user']);
if(isset ($_SESSION["user"])){
    //si connecter
    include "game.php";
}else{
// si non connecter 
include "guest.php";

}



