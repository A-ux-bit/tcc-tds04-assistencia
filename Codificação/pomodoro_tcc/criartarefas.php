<?php
    include("conecta.php");
    $nome = $_POST['nome'];
    $previsto = $_POST['previsto'];
    $data = $_POST['data'];
    $sql = "INSERT INTO tarefa(nome,previsto,data) VALUES ('$nome', '$previsto', '$data')";
    if(mysqli_query($conn, $sql)){
        echo "<script type='text/javascript'>
        alert('A tarefa foi criada!');
        location.href='relatorio.php';
        </script>";
    }
    else
    {
        echo "<script type='text/javascript'>
        alert('A tarefa não foi criada!');
        location.href='index.php';
        </script>";
    }
    mysqli_close($conn);
?>