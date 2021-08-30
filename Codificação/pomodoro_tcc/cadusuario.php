<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="./pomodoro.css">
</head>
<body>
    <div id="pagina-login" class="">
        <div id="form" class="">
            <!--form id="registrar-form" action="cadusuario.php" method="POST" class="">
                <fieldset class="field">
                <h3>Cadastrar conta</h3>
                <input type="text" name="login" placeholder="Usuário"/>
                <input type="text" name= "senha" placeholder="Senha"/>
                <input type="text" name= "email" placeholder="E-mail"/>
                <button type="submit">Criar nova conta</button>
                <p class="mensagem">Já tem uma conta? <a href="index.php">Login</a> </p>
                </fieldset>
            </form-->

            <form id="login-form" action="usuariocad.php" method="POST" class="">
                <fieldset class="field">
                <h3>Cadastrar conta</h3>
                <input type="text" name="nome" required placeholder="Nome"/>
                <input type="text" name="login" required placeholder="Usuário"/>
                <input type="text" name= "senha" required placeholder="Senha"/>
                <input type="text" name= "email" required placeholder="E-mail"/>
                <button type="submit">Criar nova conta</button>
                <p class="mensagem">Já tem uma conta? <a href="index.php">Login</a> </p>
                </fieldset>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $('.mensagem a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "fast");
    });
    </script>

</body>
</html>