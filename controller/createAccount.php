<?php
include 'connectdb.php';

//var_dump($_POST);
$reqctrl=$bdd->prepare("SELECT connect_email from connect");
$reqctrl->execute(array());
$emaildb= $reqctrl->fetch();
var_dump($emaildb);
if($emaildb != $_POST['email']){
    

    $req = $bdd->prepare("INSERT INTO connect(connect_pseudo, connect_password, connect_email) VALUES(:connect_pseudo, :connect_password,:connect_email) ");
    $req->execute(array(
        'connect_pseudo' => htmlspecialchars($_POST['pseudo']),
        'connect_password' => password_hash($_POST['password1'], PASSWORD_BCRYPT),
        'connect_email' => $_POST['email']
    ));
    $accountId = $bdd->lastInsertId();

    $req2 = $bdd->prepare("INSERT INTO account(connect_id,account_name,account_amount) VALUES (:connect_id, :account_name, :account_amount)");
    $req2->execute(array(
        'connect_id' => $accountId,
        'account_name' => htmlspecialchars($_POST['name']),
        'account_amount'=> 2000
    ));

    $req3 = $bdd->prepare("INSERT INTO farm(connect_id,farm_name) VALUES (:connect_id, :farm_name)");
    $req3->execute(array(
        "connect_id" => $accountId,
        "farm_name" => htmlspecialchars($_POST['farm_name'])
    ));
    
}
header("LOCATION:../index.php");
