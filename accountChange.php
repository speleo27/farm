<?php
include 'template/header.php';
$req = $bdd->prepare("SELECT * from connect inner join account on (account.connect_id= connect.connect_id) WHERE connect.connect_id=? ");
$req->execute(array(
    $_GET['connect_id']
));
$data = $req->fetch();
//var_dump($data);

?>
<div class="container">
    <h2>MODIFIER VOS DONNEES</h2>
</div>
<div class="container">
    <form action="controller/updateAccount.php" method="POST">
    <h3>Modification de l'email</h3>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" name="new_email" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confirmation Email</label>
            <input type="email" class="form-control" name="email_confirm" >
        </div>
    <h3>Modification du mot de passe </h3>
        <div class="mb-3">
            <label for="" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="password1" name="password1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Confirmation mot de passe</label>
            <input type="password" class="form-control" id="password2" name="password2">
        </div>
    <h3>Confirmation de modification</h3>
        <div class="mb-3">
            <label for="" class="form-label">Mot de passe actuel</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
   
        <button type="submit" class="btn btn-primary">Valider modification</button>
    
    </form>
</div>