<?php
// process delete operation after confirmation
if(isset($_POST['id']) && !empty($_POST['id']))
{
    // include config connection db
    include_once 'conecta.php';

    // Prepare a delete statement
    $sql = "DELETE FROM usuario WHERE id =?";
    if($stmt = mysqli_prepare($conn,  $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // set parameters
        $param_id = trim($_POST['id']);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt))
        {
            //  Records delete successfully. Redirect to landing page
            header("location:crud.php");
            exit();
        }
        else
        {
            echo "Oops! Something went wrong. Please try again leter.";
        }
    }
    // close statement
    mysqli_stmt_close($stmt);

    // close connection
    mysqli_close($conn);
}  
    else
{
      // Check existence of id parameter
        if(empty(trim($_GET['id'])))
        {
            // URL doesn't contain id parameter. Redirect to error page
            header("location:error.php");
            exit();
        }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/jpg" href="./assets/favicon.png"/>
    <title>Deletar usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
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
                        <h1>Apagar usuario</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Tem certeza que quer apagar esse usuário?</p><br>
                            <p>
                                <input type="submit" value="Sim" class="btn btn-danger">
                                <a href="relatorio.php" class="btn btn-default">Nâo</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>