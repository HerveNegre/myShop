<?php
include_once('db/connexiondb.php');



?>
<!doctype html>
<html lang="en">
<!--------------HEADER-------------------------->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!----<link href="https://fonts.googleapis.com/css?family=Avenir" rel="stylesheet">---->
  <link rel="stylesheet" href="../public/css/style.css">
  <title>Inscription</title>
</head>
<!--------------------------BODY----------------------------------->
<body class="container">

<h1>Formulaire d'inscription</h1>

<form action="./index.php" method="get">

<section>
    <div class="formInscription">
        <input type="text" placeholder="Votre pseudo ici"></input></br>
        <input type="email" placeholder="Votre email ici"></input></br>
        <input type="password" placeholder="Votre mot de passe ici"></input></br>
        <input type="password" placeholder="Confirmation mot de passe"></input></br>
    </div>
</section>
    <div class="submit">
    <button type="submit" name="inscription">S'inscrire</button>
</div>

</form>


</body>
<!---------------------------FOOTER------------------------------------------->

</html>

