<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
        header("Location: login.php");
        exit();

        session_start();
        require_once('db.php');
        $db = new dataBase("root", "");

        //$this->affichageMain();
    ?>
</body>
</html>