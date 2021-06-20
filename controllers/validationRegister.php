<?php
include_once("../controllers/connectiondb.php");

if (isset($_POST["submit"])) {
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password = password_hash($password, PASSWORD_BCRYPT);
  $password_confirm = $_POST["password_confirm"];
  
  $nameBool = false;
  $emailBool = false;
  $passwordBool = false;

  $nameError = "";
  $emailError = "";
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

/********************validation email***********************/
  if (empty($email)) {
    $emailError = "Entrez une adresse email svp !";
    $emailBool = false;
  } else {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailBool = true;
    } else {
      $emailError = "Email incoorect !";
      $emailBool = false;
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

  /********************if all validation are true it will insert to database***********************/
  if ($nameBool == true && $passwordBool == true) {
    $req = "INSERT INTO users (name, email, password)
            VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection,$req);
    if ($result) {
      echo "user ajouté";
    } else {
      echo "echec";
    }
  }

}