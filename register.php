<?php
    session_start();

    if(isset($_POST['email'])){
        $wszystkoOK=true;

        $nick = $_POST['nick'];

        if((strlen($nick)<3) || (strlen($nick)>10)){
            $wszystkoOK=false;
            $_SESSION['e_nick']="Login musi posiadać od 3 do 10 znaków!";
        }

        if($wszystkoOK==true){

        }
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sklep zbrojny - Rejestracja</title>
    <link rel="stylesheet" href="style.css">
</script>
</head>

<body>
    <div class="container logContainer">
        <div class="logowanie">
            <form method="post">
                <h1>Rejestracja</h1>
                <p>Login:</p>
                <input type="text" name="nick">
                <p>Email:</p>
                <input type="email" name="email">
                <p>Password:</p>
                <input type="password" name="pass1">
                <p>Password again:</p>
                <input type="password" name="pass2">
                <br>
                <br>
                <input type="submit" class="btn" value="Zarejestruj się">

                <h3>Masz już konto?</h3>
                <br>
                <br>
                <a href="index.php" class="btn">Wróć do logowania</a>
            </form>
        </div>
    </div>



</body>

</html>