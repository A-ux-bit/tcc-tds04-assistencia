<?php
    session_start();
    include ("conecta.php");
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $logar = mysqli_query($conn, "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'") or die(mysqli_connect_error());
    if(mysqli_num_rows($logar)>0){
        $usuario = mysqli_fetch_array($logar);
        $_SESSION["user"] = $usuario['nome'];
        $_SESSION["status"] = "OK";
        //$_SESSION["user"] = ['login'];
        echo "<script type='text/javascript'>
        location.href='pomodoro.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
        alert('Login ou senha incorretos! Tente novamente!');
        location.href='index.php';
        </script>";
    }
    mysqli_close($conn);
?>