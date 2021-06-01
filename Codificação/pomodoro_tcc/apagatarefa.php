<?php
    
    include("conecta.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM tarefa WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed");
        }
        
        $SESSION['message'] = 'tarefa apagada com sucesso';
        $SESSION['message_type'] = 'tarefa nao apagada com sucesso';
        header("Location: relatorio.php");
    }

?>