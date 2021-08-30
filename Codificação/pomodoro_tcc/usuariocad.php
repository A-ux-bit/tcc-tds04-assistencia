<?php
    include("conecta.php");
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $sql = "INSERT INTO usuario(nome,login,senha,email) VALUES ('$nome', '$login', '$senha', '$email')";
    if(mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>
        alert('Usúario cadastrado com sucesso!');
        location.href='index.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
        alert('Usúario não foi cadastrado!');
        location.href='cadusuario.php';
        </script>";
    }
    mysqli_close($conn);
?>