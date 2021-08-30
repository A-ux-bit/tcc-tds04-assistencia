<?php

require_once "conecta.php";
 

$nome     = $login     = $senha     = $email     = $tipo     = "";
$nome_err = $login_err = $senha_err = $email_err = $tipo_err  = "";
 


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

    
    $input_login = trim($_POST["login"]);
    if(empty($input_login))
    {
        $login_err = "Por favor preenche os campos.";
    }
    elseif(!($input_login))
    {
        $login_err = "Preenche os dados invalidos.";
    }
    else
    {
        $login = $input_login;
    }

    $input_senha = trim($_POST["senha"]);
    if(empty($input_senha))
    {
        $senha_err = "Por favor preenche a senha";
    }
    elseif(!($input_senha))
    {
        $senha_err = "Senha invalida.";
    }
    else
    {
        $senha = $input_senha;
    }

    $input_email = trim($_POST["email"]);
    if(empty($input_email))
    {
        $email_err = "Por favor preenche o seu email";
    }
    elseif(!($input_email))
    {
        $email_err = "Dados invalidos.";
    }
    else
    {
        $email = $input_email;
    }

    $input_tipo = trim($_POST["tipo"]);
    if(empty($input_tipo))
    {
        $tipo_err = "Por favor escolhe o tipo";
    }
    elseif(!($input_tipo))
    {
        $tipo_err = "Tipo não opcionado.";
    }
    else
    {
        $tipo = $input_tipo;
    }
    
    
    if(empty($nome_err) && empty($login_err) && empty($senha_err) && empty($email_err) && empty($tipo_err))
    {
       
        $sql = "UPDATE usuario SET nome=?, login=?, senha=?, email=?, tipo=? WHERE id=?";

        if($stmt = mysqli_prepare($conn, $sql))
        {
            
            mysqli_stmt_bind_param($stmt, "sssssi" ,$nome, $login, $senha, $email, $tipo, $param_id);
            
            
            $nome       = $nome;
            $login   = $login;
            $senha     = $senha;
            $email      = $email;
            $tipo       = $tipo;
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt))
            {
               
                header("location: crud.php");
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
        
        
        $sql = "SELECT * FROM usuario WHERE id = ?";
        if($stmt = mysqli_prepare($conn, $sql))
        {
           
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
           
            $param_id = $id;
            
            
            if(mysqli_stmt_execute($stmt))
            {
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1)
                {
                   
                    $usuario = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    
                    $nome       = $usuario["nome"];
                    $login   = $usuario["login"];
                    $senha     = $usuario["senha"];
                    $email   = $usuario["email"];
                    $tipo     = $usuario["tipo"];

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
    <title>Atualizar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    
  
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="container">
        <div class="signup-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Editar usuario</h2>
                    </div>
                    <p>Por favor atualize as informações a desejar</p>
                    <form action="<?= htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?= (!empty($nome_err)) ? 'has-error' : ''; ?>">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?= $nome; ?>">
                            <span class="help-block"><?= $nome_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($login_err)) ? 'has-error' : ''; ?>">
                            <label>Usuário</label>
                            <input type="text" name="login" class="form-control" value="<?= $login; ?>">
                            <span class="help-block"><?= $login_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($senha_err)) ? 'has-error' : ''; ?>">
                            <label>Senha</label>
                            <input type="password"  name="senha" class="form-control" value="<?= $senha; ?>">
                            <span class="help-block"><?= $senha_err;?></span>
                        </div>

                        <div class="form-group <?= (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>email</label>
                            <input type="email" name="email" class="form-control" value="<?= $email; ?>">
                            <span class="help-block"><?= $email_err;?></span>
                        </div>

                        <div class="form-group<?= (!empty($tipo_err)) ? 'has-error' : ''; ?>">
                            <label>tipo</label>
                            <select name="tipo" class="form-control" value="<?= $tipo; ?>">
                            <option value="admin">admin</option>
                            <option value="normal">normal</option>
                            </select>
                            <span class="help-block"><?= $tipo_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?= $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="concluir">
                        <a href="crud.php" class="btn btn-default" style="color:red;">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>