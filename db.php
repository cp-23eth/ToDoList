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
        $stmt = $this->dbh->prepare("SELECT * FROM utilisateurs WHERE `adresseMail` = '$adresseMail' OR `nom` = '$nom'");
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user !== false){
            if ($user['nom'] === $nom){
                $error = "Ce nom est déjà pris";
                return $error;
            }
            else if ($user['adresseMail'] === $adresseMail){
                $error = "Cette adresse mail est déjà prise";
                return $error;
            }
            else {
                return true;
            }
        }
        else{
            return true;
        }
        
    }

    function login($nom, $password){
        $stmt = $this->dbh->prepare("SELECT * FROM `utilisateurs` where `nom` = '$nom' AND `password` = '$password'");
        // $stmt->bindParam(':nom', $nom);
        // $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user !== false){
            if ($user['nom'] === $nom && $user['password'] === $password){
                return true;
            }
            else {
                return false;
            }
        }
        else{
            return false;
        } 
    }
        

    function task($titre, $dateToDo, $valueToDo) {
        $idUser = $_SESSION['idUser'];
        $stmt = $this->dbh->prepare("INSERT INTO `task` (`nom`, `dateToDo`, `valueToDo`, `Id_Utilisateurs`) VALUES ('$titre', '$dateToDo', '$valueToDo', '$idUser')");
        // $stmt->bindParam(':titre', $titre);
        // $stmt->bindParam(':valueToDo', $valueToDo);
        // $stmt->bindParam(':dateToDo', $dateToDo);
        $stmt->execute();
    }

    function takeTask(){
        $stmt = $this->dbh->prepare("SELECT * FROM `task`");
        $stmt->execute();

        $tableau = [];

        while ($task = $stmt->fetch(PDO::FETCH_ASSOC)){
            $tableau[] = $task;
        }

        return $tableau;
    }

    function infoTask($id){
        $stmt = $this->dbh->prepare("SELECT * FROM `task` WHERE `Id_ToDo` = '$id'");
        $stmt->execute();

        $tableau2 = [];

        while ($task = $stmt->fetch(PDO::FETCH_ASSOC)){
            $tableau2[] = $task;
        }

        return $tableau2;
    }
    
    function deleteTask($id) {
        $stmt = $this->dbh->prepare("DELETE FROM `todo`.`task` WHERE (`Id_ToDo` = '$id')");
        $stmt->execute();
        $this->takeTask();
        header("Location: main.php");
        exit();
    }

    function editTask($id, $titre, $dateToDo, $valueToDo){
        $stmt = $this->dbh->prepare("UPDATE `task` SET `nom` = '$titre', `valueToDo` = '$valueToDo', `dateToDo` = '$dateToDo' WHERE `Id_ToDo` = '$id'");
        $stmt->execute(); 
        header("Location: main.php");
        exit();
    }
}
?>