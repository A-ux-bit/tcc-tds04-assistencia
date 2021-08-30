<?php


require_once "conecta.php";

$nome     = $login     = $senha     = $email     = $tipo     = "";
$nome_err = $login_err = $senha_err = $email_err = $tipo_err  = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{


$input_nome = trim($_POST["nome"]);
    if(empty($input_nome))
    {
        $nome_err = "Por favor insira o nome.";
    }
    elseif(!filter_var($input_nome, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
        $nome_err = "Insira o nome para validar.";
    }
    else
    {
        $nome = $input_nome;
    }

    
    $input_login = trim($_POST["login"]);
    if(empty($input_login))
    {
        $login_err = "Por favor insira o nome como usuario.";
    }
    elseif(!($input_login))
    {
        $login_err = "Insira o dado para validar.";
    }
    else
    {
        $login = $input_login;
    }

    
    $input_senha = trim($_POST["senha"]);
    if(empty($input_senha))
    {
        $senha_err = "Por favor insira a senha.";
    }
    elseif(!($input_senha))
    {
        $senha_err = "Insire a senha para validar.";
    }
    else
    {
        $senha = $input_senha;
    }

    // Validate age
    $input_email = trim($_POST["email"]);
    if(empty($input_email))
    {
        $email_err = "Por favor insire o email.";     
    } 
    elseif(!($input_email))
    {
        $email_err = "Por favor insire o email validado.";
    }
    else
    {
        $email = $input_email;
    }

    // Validate date
    $input_tipo = trim($_POST["tipo"]);
    if(empty($input_tipo))
    {
        $tipo_err = "Por favor escolha a opção desejável.";     
    } 
    elseif(!($input_tipo))
    {
        $tipo_err = "Por favor opte a opção correta.";
    }
    else
    {
        $tipo = $input_tipo;
    }
    // Check input errors before inserting in database
    if(empty($nome_err) && empty($login_err) && empty($senha_err) && empty($email_err) && empty($tipo_err))
    {
        // Prepare an insert statement
        $sql = "INSERT INTO usuario (nome, login, senha, email, tipo) VALUES (?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($conn, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $nome, $login, $senha, $email, $tipo);
            
            // Set parameters
            $nome       = $nome;
            $login   = $login;
            $senha     = $senha;
            $email      = $email;
            $tipo       = $tipo;
            
          
            if(mysqli_stmt_execute($stmt)){
               
                header("location: crud.php");
                exit();
            }
            else
            {
                echo "Algo deu errado. Por favor tente novamente.";
            }
        }
         
       
        mysqli_stmt_close($stmt);
    }
    
   
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Cadastrar usuário</title>
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
                        <h2>Cadastre usuário</h2>
                    </div>
                    <p>Por favor insire as informações abaixos.</p>
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?= (!empty($nome_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
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
                            <input type="password" name="senha" class="form-control" value="<?= $senha; ?>">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="crud.php" class="btn btn-default" style="color:red;">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>