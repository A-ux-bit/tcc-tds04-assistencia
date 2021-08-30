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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/jpg" href="./assets/favicon.png"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="css/formulario.css">
    </head>
    <body>  
        <nav>
           <div>
           <?php
                echo $_SESSION["user"];
                echo "<a href='pomodoro.php' style='text-decoration: none; font-weight: bold;'>&nbsp;&nbsp;Voltar</a>";
            ?>
            </div>
        </nav>
        <body>  
    <div class="container">
        <div class="row">
            <div class="col-12">
            <br><br>
   </div>
        </div>
           </div>
        <section>
        <br/><br/>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                     <?php
                       include("conecta.php");
                       echo "<h4>Tarefas Cadastradas</h4>";
                       $sql = mysqli_query($conn, "SELECT * FROM tarefa")
                       ?>
                    <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Pomodoro Previsto</th>
                                <th>Data limite da tarefa</th>
                                <th>Horário de atividades</th>
                                <th>Horário de intervalo</th>
                                <th>Opçôes</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php
                    while($tarefa = mysqli_fetch_array($sql)){
                     ?>
                    <tr>
                      <td><?= $tarefa['id'] ;?></td>
                      <td><?= $tarefa['nome'] ;?></td>
                      <td><?= $tarefa['previsto'] ;?> 
                      <td><?= $tarefa['data']; ?></td> 
                      <td><?= $tarefa['Atividade']; ?></td> 
                      <td><?= $tarefa['intervalo']; ?></td>                  
                      <td> 
                      <?php
                      echo "<a href='tarefaver.php?id=". $tarefa['id'] ."' title='Ver tarefa' data-toggle='tooltip'> <i class='fa fa-eye' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                      echo "<a href='tarefaedita.php?id=". $tarefa['id'] ."' title='Editar tarefa' data-toggle='tooltip'> <i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                      echo "<a href='apagatarefa.php?id=". $tarefa['id'] ."' title='Apagar tarefa' data-toggle='tooltip'> <i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a>";
                      ?>
                    </td>
                    </tr>
                    <?php
                       }
                       mysqli_close($conn);
                    ?>
                    </form>
                    </tbody>
                </table>
        </section>
        </body>
       <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
        <script src="js/opcoes.js"></script>
        <script src="pomodoro.js"></script>
</html>