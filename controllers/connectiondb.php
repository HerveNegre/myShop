<?php
class ConnexionDB
{
    private static $host = "127.0.0.1"; // nom de l'host
    private static $db_name = "my_shop";//nom de la DB
    private static $user = "root";//utilisateur
    private static $pwd = "L@etitia19";// Mot de passe
    private static $connection = NULL;

    
    public static function connect()
    {
        try{
            self::$connection = new PDO("mysql:host=". self::$host. ";dbname=". self::$db_name, self::$user, self::$pwd);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "connection OK";
        }catch(PDOException $e) {
            $message = "Erreur : Impossible de se connecter à la BD !". $e->getMessage();
            die($message);
        }
        return self::$connection;
    }
    

    public static function disconnect()
    {
        self::$connection = NULL;
    }

    public function query($requete)
    {
        //pas certain pour "connection" avant prepare
        $req = $this->connection->prepare($requete);
        // echo "salut1 ";
        $req->execute();
        // echo "salut2 ";
        return $req->fetchAll(PDO::FETCH_OBJ);//on récupère sous forme d'objet
        // echo "salut3 ";
        // echo "<pre>";
        // print_r($products);
    }
}