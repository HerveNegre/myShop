<?php
session_start();

include_once("../controllers/connectiondb.php");

if (isset($_POST["submit"]))
{
    $pdo = ConnexionDB::connect();
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (insertUser($connection, $username, $email, $password));
    {
        $_SESSION["username"] = $username;
        header("Location: profile.php");
    }
}

if (isset($_POST["connection"]))
{
    $pdo = ConnexionDB::connect();
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (checkLogin($connection, $username, $password));{
        $_SESSION["username"] = $username;
        header("Location: profile.php");
    }else {
        echo "Le Pseudo est incorrect";
    }
}

function insertUser($connection, $username, $email, $password)
{
    $req = $$connection->prepare("INSERT INTO users(username, email, password)
            VALUES (:username, :email, :password)");
    $req->bindParam(":username",$username);
    $req->bindParam(":email",$email);
    $req->bindParam(":password",$password);
    
    return $req->execute();
}

function checkLogin($connection, $username, $password)
{
    $req = $connection->prepare("SELECT * FROM users
            WHERE username=:username AND password=:password");
    $req->bindParam(":username",$username);
    $req->bindParam(":password",$password);

    $req->execute();
}