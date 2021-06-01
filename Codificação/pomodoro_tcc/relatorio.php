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
                echo "<a href='pomodoro.php' style='text-decoration: none; font-weight: bold;'>&nbsp;&nbsp;Voltar</a>";
            ?>
            </div>
        </div>
        </nav>
        <section>
        <br/><br/>
            <!--?php
                include("conecta.php");
                //verifica a página atual, caso seja informada na URL, senão atribui como 1º página
                $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                //seleciona todos os registros da tabela
                $sql = mysqli_query($conn, "SELECT * FROM pessoa") or die (mysqli_error($conn));
                //conta o total de registros
                $total = mysqli_num_rows($sql);
                //seta a quantidade de registros por página
                $registros = 4;
                //calculo do número de páginas, arredondando para cimna
                $numpaginas = ceil($total / $registros);
                //calculo para início da visualização com base na página atual
                $inicio = ($registros * $pagina) - $registros;
                //seleciona os itens por página
                $cmd = mysqli_query($conn, "SELECT * FROM pessoa LIMIT $inicio,$registros");
                $total = mysqli_num_rows($cmd)>;
                echo "<h4>Pessoas Cadastradas</h4";-->
                <table class='highlight'>
                <?php
            include("conecta.php");
            echo "<h4>Tarefas Cadastradas</h4>";
            $sql = mysqli_query($conn, "SELECT * FROM tarefa");
            echo "<table class='table table-hover'>";
            echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Pomodoro Previsto</th>";
                echo "<th>Data Limite</th>";
            echo "</tr>";
            while($tarefa = mysqli_fetch_array($sql)){
            echo "<tr>";
                $id = $tarefa['id'];
                echo "<td>".$tarefa['nome']."</td>";
                echo "<td>".$tarefa['previsto']."</td>";
                echo "<td>".$tarefa['data']."</td>";
                echo "<td><a href='editatarefa.php?id=$id'><button type='submit' class='btn btn-success'>Editar</button></a>&nbsp;&nbsp;<a href='apagatarefa.php?id=$id'><button type='submit' class='btn btn-danger'>Apagar</button></a></td>";
            echo "</tr>";
            }
            mysqli_close($conn);
        ?>
                    <!--echo "<td>".$pessoa['tipo']."</td>";
                    echo "<td><a href='verpessoa.php?id=$id'><button type='submit' class='btn btn-primary'>Ver</button></a>&nbsp;&nbsp;<a href='editarpessoa.php?id=$id'><button type='submit' class='btn btn-success'>Editar</button></a>&nbsp;&nbsp;<a href='apagapessoa.php?id=$id'><button type='submit' class='btn btn-danger'>Apagar</button></a></td>";
                echo "</tr>";
                }
                echo "</table>";
                //exibe a paginação
                for($i = 1; $i <  $numpaginas + 1; $i++){
                    echo "<a href='paginacao.php?pagina=$i'>".$i." | </a>";
                }
                mysqli_close($conn);
            ?-->
        </div>
        </section>
</main>
    <script src="./pomodoro.js"></script>
    </body>
</html>