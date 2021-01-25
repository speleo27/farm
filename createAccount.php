<?php
include 'template/header.php';

?>
<div class="container">
  <h2 class="text-center">Création de compte</h2>
</div>
<div class="container">
  <form action="controller/createAccount.php" method="post">
    <div class="mb-3">
      <label for="" class="form-label">Email</label>
      <input type="email" class="form-control" name="email">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Noms</label>
      <input type="text" class="form-control" id="" name="name">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Pseudo</label>
      <input type="text" class="form-control" id="" name="pseudo">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Nom de la ferme</label>
      <input type="text" class="form-control" id="" name="farm_name">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">mot de passe</label>
      <input type="password" class="form-control" id="password1" name="password1">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">mot de passe</label>
      <input type="password" class="form-control" id="password2"name="password2">
      <p>Confirmation Mot de passe</p>
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="Check1" required>
      <label class="form-check-label" for="exampleCheck1">Je confirme ne pas etre un robot</label>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
  </form>
</div>
<script>
$(document).ready(function () {
  
});

</script>