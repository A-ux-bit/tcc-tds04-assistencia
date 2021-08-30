<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    
    require_once "conecta.php";
    
    
    $sql = "SELECT * FROM tarefa WHERE id = ?";
  
    if($stmt = mysqli_prepare($conn, $sql))
    {
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        
        $param_id = trim($_GET["id"]);
        
        
        if(mysqli_stmt_execute($stmt))
        {
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1)
            {
    
                $tarefa = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                
                $nome       = $tarefa["nome"];
                $previsto   = $tarefa["previsto"];
                $data     = $tarefa["data"];
                $atividade = $tarefa["Atividade"];
                $intervalo = $tarefa["intervalo"];
            }
            else
            {
                
                header("location: error.php");
                exit();
            }
        }
        else
        {
            echo "Oops! Algo deu errado. Por favor tente mais tarde!";
        }
    }
     
    
    mysqli_stmt_close($stmt);
    
    
    mysqli_close($conn);
}
else
{
    print_r($sql);
    exit();
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/jpg" href="./assets/favicon.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Ver tarefa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Verificar tarefa</h1>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Nome :<span class="font-weight-bold text text-success"> <?= $tarefa["nome"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>Pomodoro previsto : <span class="font-weight-bold"> <?= $tarefa["previsto"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>data : <span class="font-weight-bold"> <?= $tarefa["data"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>Horário de atividade : <span class="font-weight-bold"> <?= $tarefa["Atividade"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>Horário de intervalo : <span class="font-weight-bold"> <?= $tarefa["intervalo"]; ?></span></label>
                    </div>
                    <br>
            </div>
                   <p><a href="relatorio.php" type="button" class="btn btn-outline-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
        </main>
</body>
</html>