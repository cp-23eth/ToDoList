<?php
    session_start();
    require_once('db.php');
    $db = new dataBase("root", "");
?>

<?php
    $db->deleteTask($_POST['delete']); // valeur
    header("Location: main.php");
    exit();
?>