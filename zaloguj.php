<?php

    session_start();

    if((!isset($_POST['login'])) || (!isset($_POST['password']))){
        header('Location: index.php');
        exit();
    }

    require_once "connect.php";

    $connect =@new mysqli($host, $db_user, $db_password, $db_name);

    if($connect->connect_errno!=0){
        echo "Error: ".$connect-> connect_errno;
    }
    else{
        $login = $_POST['login'];
        $password = $_POST['password'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
        $password = htmlentities($password, ENT_QUOTES, "UTF-8");

        $sql = "SELECT * FROM users WHERE user='$login' AND pass='$password'";

        if($result = @$connect->query($sql)){
            $ilu_userow = $result->num_rows;
            if($ilu_userow>0){

                $_SESSION['zalog']= true;

                $wiersz = $result->fetch_assoc();
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['user'] = $wiersz['user'];

                unset($_SESSION['blad']);
                
                $result->free_result();
                header('Location: main.php');
            }
            else{
                $_SESSION['blad'] = '<h1 style="color:red">Zły login lub hasło!</h1>';

                header('Location: index.php');
            }
        }

        $connect->close();
    }
?>