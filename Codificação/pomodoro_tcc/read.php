<?php

if(isset($_GET["id"]) && !empty(trim($_GET["id"])))
{
    
    require_once "conecta.php";
    
    
    $sql = "SELECT * FROM usuario WHERE id = ?";
  
    if($stmt = mysqli_prepare($conn, $sql))
    {
        
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        
        $param_id = trim($_GET["id"]);
        
        
        if(mysqli_stmt_execute($stmt))
        {
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1)
            {
    
                $usuario = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
               
                $nome       = $usuario["nome"];
                $login   = $usuario["login"];
                $senha     = $usuario["senha"];
                $email        = $usuario["email"];
                $tipo         = $usuario["tipo"];
                
            
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
    <title>Ver usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
   
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
                        <h1>Verificar usuário</h1>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Nome :<span class="font-weight-bold text text-success"> <?= $usuario["nome"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>login : <span class="font-weight-bold"> <?= $usuario["login"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>senha : <span class="font-weight-bold"> <?= $usuario["senha"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>email : <span class="font-weight-bold"> <?= $usuario["email"]; ?></span></label>
                    </div>
                    <div class="form-group">
                        <label>tipo : <span class="font-weight-bold"> <?= $usuario["tipo"]; ?></span></label>
                    </div>
                    <p><a href="crud.php" type="button" class="btn btn-outline-primary">Voltar</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>