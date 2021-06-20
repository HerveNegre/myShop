<?php
include_once("../controllers/connectiondb.php");

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $nameBool = false;
  $passwordBool = false;

  $nameError = "";
  $passwordError = "";

/********************validation username***********************/
  if (empty($username)) {
    $nameError = "Entrez un Pseudo svp !";
    $nameBool = false;
  } else {
    if (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
      $nameError = "Le Pseudo doit etre de caractere alphanumerique";
      $nameBool = false;
    } else {
      $nameBool = true;
    }
  }

/********************validation password***********************/
  if (empty($password) || !strlen($password) > 3) {
    $passwordError = "Veuillez entrer un mot de passe de 3 caracteres minimum svp !";
    $passwordBool = false;
  } else {
    if ($password == $password_confirm) {
      $passwordBool = true;
    } else {
      $passwordError = "Les mots de passe doivent etre identique !";
      $passwordBool = false;
    }
  }
}