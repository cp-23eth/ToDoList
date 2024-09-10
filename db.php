<?php
class DataBase {
    private PDO $dbh;
    
    function __construct($user, $password){
        $this->dbh = new PDO('mysql:host=localhost;dbname=todo', $user, $password);
    }

    function createUser($nom, $password){
        // $stmt = $this->dbh->prepare('INSERT INTO `utilisateur` (`nom`, `password`) VALUES ($nom, $password)');
        $str = "INSERT INTO `utilisateur` (`nom`, `password`) VALUES ('$nom', '$password')";
        $this->dbh->query($str);
    }   
}
?>
