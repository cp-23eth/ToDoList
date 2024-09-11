<?php
class DataBase {
    private PDO $dbh;
    
    function __construct($user, $password){
        $this->dbh = new PDO('mysql:host=localhost;dbname=todo', $user, $password);
    }

    function createUser($adresseMail, $nom, $password){
        $stmt = $this->dbh->prepare("INSERT INTO `utilisateurs` (`adresseMail`, `nom`, `password`) VALUES ('$adresseMail', '$nom', '$password')");
        $stmt->execute();
    }

    function user($adresseMail, $nom){
        $stmt = $this->dbh->prepare("SELECT * FROM utilisateurs where adresseMail = :adresseMail");
        $stmt->bindParam(':adresseMail', $adresseMail);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user){
            return true;
        }
        else{
            if ($user['adresseMail'] === $adresseMail){
                echo "<br>";
                echo "Error : cette adresse mail est déjà prise";
            }
            else if ($user['nom'] === $nom){
                echo "<br>";
                echo "Error : ce nom est déjà prise";
            }
        }
    }

    function login($nom, $password){
        $stmt = $this->dbh->prepare("SELECT * FROM utilisateurs where nom = :nom");
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['nom'] === $nom && $user['password'] === $password){
            return true;
        }
        else if ($user['nom'] === "" && $user['password'] === ""){
            echo "<br>";
            echo "Error, vos informations de connexion sont éronnées"; 
        }
        else {
            echo "<br>";
            echo "Error, vos informations de connexion sont éronnées";
        }
    }

    function task($titre, $dateToDo, $valueToDo) {
        $stmt = $this->dbh->prepare("INSERT INTO `task` (`nom`, `dateToDo`, `valueToDo`) VALUES ('$titre', '$dateToDo', '$valueToDo')");
        // $stmt->bindParam(':titre', $titre);
        // $stmt->bindParam(':valueToDo', $valueToDo);
        // $stmt->bindParam(':dateToDo', $dateToDo);
        $stmt->execute();
    }
}
?>