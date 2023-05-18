<?php
    session_start();

    if(isset($_POST['email'])){
        $wszystkoOK=true;

        $nick = $_POST['nick'];

        if((strlen($nick)<3) || (strlen($nick)>10)){
            $wszystkoOK=false;
            $_SESSION['e_nick']="Login musi posiadać od 3 do 10 znaków!";
        }

        if(ctype_alnum($nick)==false){
            $wszystkoOK=false;
            $_SESSION['e_nick']="Login może zawierać tylko litery i cyfry! (bez polskich znaków)";
        }

        $email = $_POST['email'];
        $emailB = filter_var($email, FILTER_SANITIZE_EMAIL);

        if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email)){
            $wszystkoOK=false;
            $_SESSION['e_email']="Niepoprawny adres e-mail!";
        }

        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if((strlen($pass1)<6) || (strlen($pass1)>20)){
            $wszystkoOK=false;
            $_SESSION['e_pass']="Hasło musi posiadać od 6 do 20 znaków!";
        }

        if($pass1!=$pass2){
            $wszystkoOK=false;
            $_SESSION['e_pass']="Podane hasła nie są identyczne!";
        }

        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);

        $_SESSION['fr_nick']=$nick;
        $_SESSION['fr_email']=$email;
        $_SESSION['fr_pass1']=$pass1;
        $_SESSION['fr_pass2']=$pass2;

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $connect = new mysqli($host, $db_user, $db_password, $db_name);
            if($connect->connect_errno!=0){
                throw new Exception(mysqli_connect_errno());
            }
            else{
                $rezultat = $connect->query("SELECT id FROM users WHERE email='$email'");

                if(!$rezultat) throw new Exception($connect->error);

                $ile_takich_maili = $rezultat -> num_rows;
                if($ile_takich_maili>0){
                    $wszystkoOK=false;
                    $_SESSION['e_email']="Taki email jest już zajęty!";
                }

                $rezultat = $connect->query("SELECT id FROM users WHERE user='$nick'");

                if(!$rezultat) throw new Exception($connect->error);

                $ile_takich_nickow = $rezultat -> num_rows;
                if($ile_takich_nickow>0){
                    $wszystkoOK=false;
                    $_SESSION['e_nick']="Taki login jest już zajęty!";
                }

                if($wszystkoOK==true){
                    if($connect->query("INSERT INTO users VALUES (NULL, '$nick', '$pass_hash', '$email')")){
                        $_SESSION['goodRegister']=true;
                        header("Location: welcome.php");
                    }
                    else{
                        throw new Exception($connect->error);
                    }
                }

                $connect->close();
            }
        }
        catch(Exception $e){
            echo "Błąd serwera!";
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
                <input type="text" value="<?php if(isset($_SESSION['fr_nick'])){echo $_SESSION['fr_nick'];unset($_SESSION['fr_nick']);} ?>" name="nick">

                <?php
                    if (isset($_SESSION['e_nick'])){
                        echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                        unset($_SESSION['e_nick']);
                    }
                ?>

                <p>E-mail:</p>
                <input type="email" value="<?php if(isset($_SESSION['fr_email'])){echo $_SESSION['fr_email'];unset($_SESSION['fr_email']);} ?>" name="email">

                <?php
                    if (isset($_SESSION['e_email'])){
                        echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                        unset($_SESSION['e_email']);
                    }
                ?>

                <p>Hasło:</p>
                <input type="password" value="<?php if(isset($_SESSION['fr_pass1'])){echo $_SESSION['fr_pass1'];unset($_SESSION['fr_pass1']);} ?>" name="pass1">

                <?php
                    if (isset($_SESSION['e_pass'])){
                        echo '<div class="error">'.$_SESSION['e_pass'].'</div>';
                        unset($_SESSION['e_pass']);
                    }
                ?>

                <p>Powtórz hasło:</p>
                <input type="password" value="<?php if(isset($_SESSION['fr_pass2'])){echo $_SESSION['fr_pass2'];unset($_SESSION['fr_pass2']);} ?>" name="pass2">
                <p>
                    <input type="submit" class="btn" value="Zarejestruj się">
                </p>

                <h3>Masz już konto?</h3>
                <a href="index.php" class="btn">Wróć do logowania</a>
            </form>
        </div>
    </div>



</body>

</html>