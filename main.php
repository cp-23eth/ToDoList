<?php
    session_start();
    require_once('db.php');
    $db = new dataBase("root", "");
?>

<!-- <?php 
    if (isset($_POST['confirmation'])){
        header("Location: main.php");
        exit();
    }
?> mardi-->

<!doctype html>
<html lang="en">

<head>
    <title>Main</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
</head>

<body>
    <header class="p-2" style="background-color: #C8AD7F;">
        <div class="position-relative">
            <h1 class="text-center fw-bold" style="font-size: 70px;">
                Vos tâches
            </h1>
            <button class="rounded-3" style="width: 40px; height: 40px" onclick="window.location.href = 'login.php'">
                <i class="fas fa-sign-out-alt"></i>
            </button>
            <button class="rounded-3" style="width: 40px; height: 40px" onclick="window.location.href = 'addTask.php'">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>


    </header>
    <main>
        <div class="container">
            <?php
            $tasks = $db->takeTask();

            $row = 0;
            echo "<div class='row'>";

            foreach ($tasks as $task) {
                $id = $task['Id_ToDo'];
                $nom = $task['nom'];
                $value = $task['valueToDo'];
                $date = $task['dateToDo'];
                $userId = $task['Id_Utilisateurs'];

                if ($userId === $_SESSION['idUser']){
                    if ($row % 3 === 0 && $row != 0) {
                        echo "<div class='row'>";
                    } ?>

                    <div class='col-md-4'>
                        <div class='card border-3 mt-5 card-body d-flex flex-column' style='width: 100%; height: 22rem;' id='$row'>
                            <h2 style='background-color: #83939e;' class='card-title text-center rounded-4 fw-bold m-1'><?= $nom ?></h2>
                            <div class='Description flex-grow-1'>
                                <p class='card-text p-2'><?= $value ?></p>
                            </div>
                            <div class='d-flex align-items-center justify-content-between mt-5'>
                                <form method='post' action='deleteTask.php'>
                                    <button type='submit' name='delete' value='<?= $id ?>' class='fa-solid fa-check fs-4 border-0' style='background-color: white'></button>
                                </form>
                                <h4 class='text-center p-2 rounded-4 flex-grow-1 mx-3' style='background-color: #cfd6db;'><?= $date ?></h4>
                                <form method='post' action='editTask.php'>
                                    <button type='submit' name='edit' value='<?= $id ?>' class='fa-solid fa-pencil fs-4 border-0' style='background-color: white'></button>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                $row++;

                if ($row % 3 === 0 && $row != 0) {
                    echo "</div>";
                }
                }
            }
            ?>
        </div>
    </main>
    <footer>
        <br>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/d91a7502cf.js" crossorigin="anonymous"></script>
</body>

</html>