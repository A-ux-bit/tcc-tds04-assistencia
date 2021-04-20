<?php
    session_start();
    /*if($_SESSION["status"] !="OK"){
        header('location.index.php');
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pomodoro TCC</title>
    <link rel="shortcut icon" type="image/jpg" href="./assets/favicon.png"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./pomodoro.css">
</head>
<body>
<?php
echo $_SESSION["user"];
echo "<a href='sair.php'> Sair </a>"
?>
<div id="modal-info" class="modal">
    <div class="modal-content">
        <h4>O que é Pomodoro?</h4>
        <p>Pomodoro é uma prática....</p>
    </div>
</div>
<div id="modal-configurar-tempo" class="modal">
    <div class="modal-content">
        <h4>Configurar Tempo</h4>
        <form class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">query_builder</i>
                    <input value="25" id="ipt-minutos" type="number" class="validate">
                    <label for="ipt-minutos">Minutos</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">timer</i>
                    <input value="0" id="ipt-segundos" type="number" class="validate">
                    <label for="ipt-segundos">Segundos</label>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="modal-close waves-effect waves-light btn-flat"><i class="material-icons left">cancel</i>Cancelar</button>
        <button id="btn-salvar" class="modal-close waves-effect waves-light btn"><i class="material-icons left">save</i>Salvar</button>
    </div>
</div>
<main id="conteudo" class="row">
    <div class="col s10 offset-s1">
        <div class="row linha-logomarca">
            <div class="col s4">
                    <!--img src="./assets/logo.svg" alt="Logomarca"-->
                </div>
                <div class="col s4">
                    <button class="btn waves-effect waves-light btn-large modal-trigger" data-target="modal-configurar-tempo" type="button">
                        Customizar Tempo
                        <i class="material-icons right">alarm</i>
                    </button>
                </div>
                <div class="col s4">
                    <button class="btn waves-effect waves-light btn-large modal-trigger" data-target="modal-info" type="button">
                        O que é Pomodoro?
                        <i class="material-icons right">help</i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col s4">
                    <button id="btn-padrao" class="btn waves-effect waves-light btn-large" type="submit" name="action">
                        Padrão
                        <i class="material-icons right">watch_later</i>
                    </button>
                </div>
                <div class="col s4">
                    <button id="btn-pausa-curta" class="btn waves-effect waves-light btn-large" type="submit" name="action">
                        Pausa Curta
                        <i class="material-icons right">watch</i>
                    </button>
                </div>
                <div class="col s4">
                    <button id="btn-pausa-longa" class="btn waves-effect waves-light btn-large" type="submit" name="action">
                        Pausa Longa
                        <i class="material-icons right">timer</i>
                    </button>
                </div>
                <!--div class="row">
                    <div class="col s12 img-area">
                        <img class="img-apagado mostrar-imagem" width="17%" src="./assets/pomodoro-apagado.svg" alt="Imagem tomate">
                        <img class="img-aceso" width="17%" src="./assets/pomodoro-aceso.svg" alt="Imagem tomate">
                    </div-->
                    <div class="col s12 textarea">
                        <span class="tempo">
                        25:00
                        </span>
                    </div>
                    <div class="col s12 textarea">
                        <i id="btn-play" class="material-icons right">play_circle_filled</i>
                        <i id="btn-pause" class="material-icons right">pause_circle_filled</i>
                        <i id="btn-restart" class="material-icons right">restore</i>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="./pomodoro.js"></script>
</body>
</html>