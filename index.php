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

        require_once('db.php');
        $db = new dataBase("root", "");
        
        // $stmt->binParam(':ethan.hofstetter@ceff.ch', $adresseMail);
        // $stmt->binParam(':Ethan', $nom);
        // $stmt->binParam(':salut', $password);

        // $adresseMail = "ethan.hofstetter@ceff.ch";
        // $nom = "ethan";
        // $password = 'password';

        // if ($db.$adresseMail === $adresseMail){
        //     echo "L'adresse mail est déjà utilisée";
        // }
        // else if ($db.$nom === $nom) {
        //     echo "Le nom d'utilisateur est déjà utilisé";
        // }
        // else {
        //     $db->createUser($adresseMail, $nom, $password);
        // }
        // $stmt->execute();
    ?>
</body>
</html>