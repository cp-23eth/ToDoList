<?php
    session_start();
    require_once('db.php');
    $db = new dataBase("root", "");

    $_SESSION['errorLogin'] = "";
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <style>
            .bouton{
                background-color: #BACBDB;
            }

            .input{
                background-color: #C8AD7F99;
            }
        </style>
    </head>

    <body>
        <header class="p-2" style="background-color: #C8AD7F;">
            <h1 class="text-center fw-bold" style="font-size: 70px;">ToDo List - Login</h1>
        </header>
        <main>
            <form action="" method="post">
                <div class="container"><div class=""></div>
                    <div class="row mt-5"></div><div class="row mt-5"></div><div class="row mt-5"></div><div class="row mt-5">
                    <div class="row mt-5">
                        <h3 class="offset-4 col-4 text-center">Entrez vos informations pour vous connecter :</h3>
                    </div>
                    <div class="row mt-2">
                        <div class="offset-4 col-4 d-grid mt-3"><input name="identifiant" type="text" class="p-3 rounded-5 border-0 text-center fs-4 input" placeholder="Identifiant"></div>
                    </div>
                    <div class="row mt-2">
                        <div class="offset-4 col-4 d-grid mt-3"><input name="mdp" type="password" class="p-3 rounded-5 border-0 text-center fs-4 input" placeholder="Mot de passe"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="offset-5 col-2 d-grid mt-3"><button type="submit" class="rounded-4 border-0 p-1 bouton">Confirmer</button></div>
                    </div>
                    <div class="row">
                        <div class="offset-4 col-4 d-grid"><hr></div>
                    </div>
                    <div class="row">
                        <div class="offset-5 col-2 d-grid"><button class="rounded-4 border-0 p-1 bouton"><a href="signUp.php">Créer un compte</a></button></div>
                    </div>
                </div>
            </form>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <script>
            
        </script>
        <script
            $primary: black;
            @import "bootstrap"; //use full path to bootstrap.scss

            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

        <?php
            if (isset($_POST['identifiant']) && isset($_POST['mdp'])){
                $nom = $_POST['identifiant'];
                $password = $_POST['mdp'];
                $error = $db->login($nom, $password);
                if($error === false){
                    echo "<br>";
                    echo "<div class='text-danger text-center fs-3'>Veuillez entrer des informations de connexion correctes</div>";
                }
                else {
                    header("Location: main.php");
                    exit(); 
                }
            }
        ?>
    </body>
</html>
