<?php
    include("conecta.php");
    $nome = $_POST['nome'];
    $previsto = $_POST['previsto'];
    $data = $_POST['data'];
    $sql = "UPDATE tarefa SET nome='$nome', previsto='$previsto', data='$data'";
    if(mysqli_query($conn, $sql)){
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('Tarefa atualizada com sucesso!');
        window.location.href = 'relatorio.php';
        </script>";
    }
    else {
        echo "<script language = 'javascript' type = 'text/javascript'>
        alert('A Tarefa não foi atualizada com sucesso!');
        window.location.href = 'relatorio.php';
        </script>";
    }
    mysqli_close($conn);
?>