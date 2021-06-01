<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Pomodoro</title>
        <meta charset = "UTF-8"/>
        <link rel="shortcut icon" type="image/jpg" href="./assets/favicon.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="./pomodoro.css">
    </head>
    <body>
<main id="conteudo" class="row">
<nav>
          <div>
           <?php
                echo $_SESSION["user"];
                echo "<a href='relatorio.php' style='text-decoration: none; font-weight: bold;'>&nbsp;&nbsp;Voltar</a>";
            ?>
            </div>
   <div id="modal-tarefa" class="row">
     <div class="modal-content">
        <h4>Editar Tarefa</h4>
        <form class="col s12" id="editatarefa.php" action="tarefaedita.php" method="POST" class="">
            <div class="row">
            <div class="input-field col s6">
                    <i class="material-icons prefix">event_note</i>
                    <input type="text" name="nome"   class="validate">
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">event_note</i>
                    <input type="number" name="previsto" class="validate">
                    <label for="previsto">Pomodoro Previsto</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">event_note</i>
                    <input value="0" type="date" name="data" class="validate">
                    <label for="data">Data Limite da Tarefa</label>
                </div>
            </div>
          <button id="btn-salvar" class="modal-close waves-effect waves-light btn"><i class="material-icons left">save</i>Editar</button>
        </form>
        <button class="modal-close waves-effect waves-light btn-flat"><i class="material-icons left"></i><a href='relatorio.php'>Cancelar</a></button>
    </div>
</body>
</main>
<script src="./pomodoro.js"></script>
</hmtl>