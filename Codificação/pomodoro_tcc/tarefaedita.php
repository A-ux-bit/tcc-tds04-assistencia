<?php

require_once "conecta.php";
 

$nome     = $previsto     = $data       =   $atividade =   $intervalo ="";
$nome_err = $previsto_err = $data_err  = $atividade_err =  $intervalo_err ="";


if(isset($_POST["id"]) && !empty($_POST["id"]))
{
    
    $id = $_POST["id"];
    
    
    $input_nome = trim($_POST["nome"]);
    if(empty($input_nome))
    {
        $nome_err = "Por favor preenche os nomes.";
    }
    elseif(!filter_var($input_nome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $nome_err = "Por favor preenche os nomes validos.";
    }
    else
    {
        $nome = $input_nome;
    }

    
    $input_previsto = trim($_POST["previsto"]);
    if(empty($input_previsto))
    {
        $previsto_err = "Por favor preenche os campos.";
    }
    elseif(!($input_previsto))
    {
        $previsto_err = "Preenche os dados invalidos.";
    }
    else
    {
        $previsto = $input_previsto;
    }

    
    $input_data = trim($_POST["data"]);
    if(empty($input_data))
    {
        $data_err = "Por favor preenche as datas";
    }
    elseif(!($input_data))
    {
        $data_err = "Data invalida.";
    }
    else
    {
        $data = $input_data;
    }

    $input_atividade = trim($_POST["Atividade"]);
    if(empty($input_atividade))
    {
        $atividade_err = "Por favor preenche os campos.";
    }
    elseif(!($input_atividade))
    {
        $atividade_err = "Preenche os dados invalidos.";
    }
    else
    {
        $atividade = $input_atividade;
    }

    $input_intervalo = trim($_POST["intervalo"]);
    if(empty($input_intervalo))
    {
        $intervalo_err = "Por favor preenche os campos.";
    }
    elseif(!($input_intervalo))
    {
        $intervalo_err = "Preenche os dados invalidos.";
    }
    else
    {
        $intervalo = $input_intervalo;
    }
    
    
    if(empty($name_err) && empty($previsto_err) && empty($data_err) && empty($atividade_err) && empty($intervalo_err))
    {
       
        $sql = "UPDATE tarefa SET nome=?, previsto=?, data=?, Atividade=?, intervalo=? WHERE id=?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            
            mysqli_stmt_bind_param($stmt, "sssssi" ,$nome, $previsto, $data, $atividade, $intervalo, $param_id);
            
            
            $nome       = $nome;
            $previsto   = $previsto;
            $data     = $data;
            $atividade = $atividade;
            $intervalo =  $intervalo;
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt))
            {
                
                header("location: relatorio.php");
                exit();
            }
            else
            {
                echo "Oops! Algo deu errado. Por favor tente mais tarde!";
            }
        }
         
        
        mysqli_stmt_close($stmt);
    }
    
    
    mysqli_close($conn);
}
else
{
    
    if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
    {
        
        $id =  trim($_GET["id"]);
        
        
        $sql = "SELECT * FROM tarefa WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql))
        {
            
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            
            $param_id = $id;
            
           
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
        
        header("location: error.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/jpg" href="./assets/favicon.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Update</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   <!-- add style css -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
        <div class="signup-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Editar tarefa</h2>
                    </div>
                    <p>Por favor atualize as informações a desejar</p>
                    <form action="<?= htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?= (!empty($nome_err)) ? 'has-error' : ''; ?>">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?= $nome; ?>">
                            <span class="help-block"><?= $nome_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($previsto_err)) ? 'has-error' : ''; ?>">
                            <label>Pomodoro Previsto</label>
                            <input type="number" name="previsto" class="form-control" value="<?= $previsto; ?>">
                            <span class="help-block"><?= $previsto_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($data_err)) ? 'has-error' : ''; ?>">
                            <label>Data limite da tarefa</label>
                            <input value="0" type="date" name="data" class="form-control" value="<?= $data; ?>">
                            <span class="help-block"><?= $data_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($atividade_err)) ? 'has-error' : ''; ?>">
                            <label>Horário da atividade</label>
                            <input value="0" type="time" name="Atividade" class="form-control" value="<?= $atividade; ?>">
                            <span class="help-block"><?= $atividade_err;?></span>
                        </div>
                        <div class="form-group <?= (!empty($intervalo_err)) ? 'has-error' : ''; ?>">
                            <label>Horário de intervalo</label>
                            <input value="0" type="time" name="intervalo" class="form-control" value="<?= $intervalo; ?>">
                            <span class="help-block"><?= $intervalo_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?= $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Concluir">
                        <a href="relatorio.php" class="btn btn-default" style="color:red;">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>