<?php
include_once("../views/header.php");
include_once("../controllers/connectiondb.php");
include_once("../controllers/validationConnection.php");

?>
<div class="container">
  <h1>Connexion</h1>

  <form action="session.php" method="POST">
    <div class="col form-group">
      <label for="exampleInputUsername">Pseudo</label>
      <input type="text" class="form-control" name="username" aria-describedby="usernameHelp" placeholder="Votre pseudo ici" required>
      <span><?php if(isset($nameError)) { echo $nameError;}?></span>
    </div>
    <div class="col form-group">
      <label for="exampleInputPassword1">Mot de passe</label>
      <input type="password" class="form-control" name="password" placeholder="Votre mot de passe ici" required>
      <span><?php if(isset($nameError)) { echo $nameError;}?></span>
    </div>
    <div class="col">
      <button type="submit" class="btn btn-success" name="connection">Connexion</button>
    </div>
  </form>
</div>