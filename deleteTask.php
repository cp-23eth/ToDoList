<?php
    require_once('db.php');
    $db = new dataBase("root", "");
?>

<?php
    $db->deleteTask($_POST['delete']); // valeur
?>