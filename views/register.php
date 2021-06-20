<?php
include_once("../views/header.php");
include_once("../controllers/connectiondb.php");
include_once("../controllers/validationRegister.php");

?>

<div class="container">
  <h1>Inscription</h1>
  <form action="connection.php" method="POST">
    <div class="col form-group">
      <label for="exampleInputUsername">Pseudo</label>
      <input type="text" class="form-control" name="username" aria-describedby="usernameHelp" placeholder="Votre pseudo ici" required>
      <span><?php if(isset($nameError)) { echo $nameError;}?></span>
    </div>
    <div class="col form-group">
      <label for="exampleInputEmail1">Email</label>
      <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Votre email ici" required>
      <span><?php if(isset($emailError)) { echo $emailError;}?></span>
    </div>
    <div class="col form-group">
      <label for="exampleInputPassword1">Mot de passe</label></span>
      <input type="password" class="form-control" name="password" placeholder="Votre mot de passe ici" required>
      <span><?php if(isset($passwordError)) { echo $passwordError;}?>
    </div>
    <div class="col form-group">
      <label for="exampleInputPassword1">Mot de passe</label></span>
      <input type="password" class="form-control" name="password_confirm" placeholder="Confirmation mot de passe" required>
      <span><?php if(isset($passwordError)) { echo $passwordError;}?>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-success form-control" name="submit">S'inscrire</button>
    </div>
  </form>
</div>