<?php
    session_start();

    if((isset($_SESSION['zalog'])) && ($_SESSION['zalog']==true)){
        header('Location: main.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep zbrojny - Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container logContainer">
        <div class="logowanie">
            <form action="zaloguj.php" method="POST">
                <h1>Logowanie</h1>
                <p>Login:</p>
                <input type="text" name="login">
                <p>Hasło:</p>
                <input type="password" name="password">
                <p>
                    <input type="submit" value="Zaloguj się" class="btn">
                </p>
                <?php
                    if(isset($_SESSION['blad'])){
                        echo $_SESSION['blad'];
                    }
                ?>
                <h3>Nie masz konta?</h3>
                <a href="register.php" class="btn">Zarejestruj się</a>
            </form>
        </div>
    </div>



</body>

</html>