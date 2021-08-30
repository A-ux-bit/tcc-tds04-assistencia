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
                <br>
                <h3 class="titulo-tabla">Relatório de Usuarios</h3>
                <hr>
                <a href="create.php" class="btn btn-success pull-left">Adicionar outro usuário</a>
                    <?php
                        // Include config file
                        require_once "conecta.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM usuario";
                    ?>
                    <?php
                    if($result = mysqli_query($conn, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                    ?>
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Login</th>
                                        <th>Senha</th>
                                        <th>Email</th>
                                        <th>Tipo</th>
                                        <th>Opções</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($usuario = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                            <td><?= $usuario['id'] ;?></td>
                                            <td><?= $usuario['nome'] ;?></td>
                                            <td><?= $usuario['login']; ?></td>
                                            <td><?= $usuario['senha'] ;?></td>
                                            <td><?= $usuario['email'] ;?></td>
                                            <td><?= $usuario['tipo']; ?></td>
                                            <td>
                                                <?php
                                                 echo "<a href='read.php?id=". $usuario['id'] ."' title='Ver usuário' data-toggle='tooltip'> <i class='fa fa-eye' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                                                echo "<a href='update.php?id=". $usuario['id'] ."' title='Editar usuário' data-toggle='tooltip'> <i class='fa fa-edit' aria-hidden='true' style='color:#3ca23c;'></i></a>";
                                                echo "<a href='delete.php?id=". $usuario['id'] ."' title='Deletar usuário' data-toggle='tooltip'> <i class='fa fa-trash' aria-hidden='true' style='color:red;'></i></a>";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>                          
                            </table>
                        <?php
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
 
                    // Close connection
                    mysqli_close($conn);
                    ?>

            </div>
        </div>
    </div>
        <!-- library js -->
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
        
       
        <!-- internal script -->
        <script src="js/opcoes.js"></script>

</body>
</html>