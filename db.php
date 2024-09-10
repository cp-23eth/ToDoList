<?php
class DataBase {
    private PDO $dbh;
    
    function __construct($user, $password){
        $this->dbh = new PDO('mysql:host=localhost;dbname=todo', $user, $password);
    }

    function createUser($adresseMail, $nom, $password){
        $stmt = $this->dbh->prepare("INSERT INTO `utilisateurs` (`adresseMail`, `nom`, `password`) VALUES ('$adresseMail', '$nom', '$password')");
        $stmt->execute();
        // $str = "INSERT INTO `utilisateurs` (`adresseMail`, `nom`, `password`) VALUES ('$adresseMail', '$nom', '$password')";
        // $this->dbh->query($str);
    }   
}
?>