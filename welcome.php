<?php
    session_start();

    if(!isset($_SESSION['goodRegister'])){
        header('Location: index.php');
        exit();
    }
    else{
        unset($_SESSION['goodRegister']);
    }

    if(isset($_SESSION['fr_nick'])) unset($_SESSION['fr_nick']);
    if(isset($_SESSION['fr_email'])) unset($_SESSION['fr_email']);
    if(isset($_SESSION['fr_pass1'])) unset($_SESSION['fr_pass1']);
    if(isset($_SESSION['fr_pass2'])) unset($_SESSION['fr_pass2']);

    if(isset($_SESSION['e_nick'])) unset($_SESSION['e_nick']);
    if(isset($_SESSION['e_email'])) unset($_SESSION['e_email']);
    if(isset($_SESSION['e_pass1'])) unset($_SESSION['e_pass1']);
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
        <div class="logowanie column">
            <h1 class="thanks">Dzięki za rejestrację!</h1>
            <a href="index.php" class="btn">Zaloguj się</a>
        </div>
    </div>
</body>

</html>