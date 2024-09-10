<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
        $user = 'root';
        $password = '';

        require_once('db.php');
        $db = new dataBase($user, $password);

        $nom = 'Ethan';
        $password = 'password';

        // $stmt->binParam(':Ethan', $nom);
        // $stmt->binParam(':salut', $password);

        $db->createUser($nom, $password);
        // $stmt->execute();
    ?>
</body>
</html>