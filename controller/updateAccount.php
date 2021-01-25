<?php
include 'connectdb.php';
session_start();

var_dump($_SESSION['user']);
var_dump($_POST);
if(password_verify($_SESSION['user']['connect_password'],$_POST['password']))
{
    if( (!empty($_POST['new_email'])) === (!empty($_POST['email_confirm']))||((!empty($_POST['password1'])) === (!empty($_POST['password2']))))
    {
       $req=$bdd->prepare("UPDATE connect SET connect_email= ?, connect_password=? WHERE connect_id=?");
       $req->execute(array(

       ));

    }
}