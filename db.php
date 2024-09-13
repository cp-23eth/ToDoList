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

    function takeTask(){
        $stmt = $this->dbh->prepare("SELECT * FROM `task`");
        $stmt->execute();

        $tableau = [];

        // foreach ($stmt as $task){
        //     $tache = $stmt->fetch(PDO::FETCH_ASSOC);
        //     $tableau[] = $tache; 
        // }

        while ($task = $stmt->fetch(PDO::FETCH_ASSOC)){
            $tableau[] = $task;
        }

        return $tableau;
    }
    
    function deleteTask($valeur) {
        $stmt = $this->dbh->prepare("DELETE FROM `todo`.`task` WHERE (`valueToDo` = '$valeur')");
        $stmt->execute();
        $this->takeTask();
        header("Location: main.php");
        exit();
    }

    function idTask($valeur){
        $stmt = $this->dbh->prepare("SELECT `Id_ToDO` FROM `task` WHERE (`valueToDo` = '$valeur')");
        $stmt->execute();

        $idTask = $stmt;
        return $idTask;
    }

    function editTask($titreM, $dateToDoM, $valueToDoM){
        $id = $this->idTask($valueToDoM);
        $stmt = $this->dbh->prepare("UPDATE `task` SET `nom` = '$titreM', `valueToDo` = '$valueToDoM', `dateToDo` = '$dateToDoM' WHERE `Id_ToDo = '$id'");
        $stmt->execute(); 
        header("Location: main.php");
        exit();
    }
}
?>