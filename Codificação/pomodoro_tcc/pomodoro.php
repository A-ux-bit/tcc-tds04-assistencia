<?php
    session_start();
    if($_SESSION["status"] !="OK"){
        header('location:index.php');
    }
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./pomodoro.css">
</head>
<body>
<nav>
    <div class="col-xs-4 col-xs-offset-1">
         <?php
            echo "<span class='glyphicon glyphicon-user' aria-hidden='true'></span>";
            echo $_SESSION["user"];
            echo "<a href='sair.php' style='text-decoration: none; font-weight: bold;'>&nbsp;&nbsp;Sair</a>";
            ?>
    </div>

    <ul class="nav-list">
        <?php
            include("menu.php");
        ?>
        <li><a href='relatorio.php'>Relátorio</a></li>
    </ul>

</nav>
<div id="modal-info" class="modal">
    <div class="modal-content">
        <h4>O que é Pomodoro?</h4>
        <p>Pomodoro é uma prática que ajuda na gestão de tempo de tarefas e estudos, desnvolvida em 1988 pelo italiano Francisco Cirilo.</p>
        <p>Ela pode ser Aplicada para diversas tarefas, assim como nos estudos e nos trabalhos.</p>
        <p>No princípio, a técnica terá 4 ciclos com 25 minutos de focos para fazer atividade, e cada ciclo terá 5 minutos de intervalo e ao completar 4 ciclos, terá mais de 15 minutos de descanso (nessa parte dependerá do gosto dos programadores).</p>
        <p>Ao utilizar técnica pomodoro,além de utilizar normalmente,é possível também configurar o tempo da atividade,intervalo curto e longo,e também os ciclos necessários para entrar no intervalo longo.</p>
        <div class="modal-footer">
        <a href="#!" class="modal-action modal-close btn-flat">Que tenha um bom trabalho!</a>
      </div>
    </div>
</div>
<div id="modal-configurar-tempo" class="modal">
    <div class="modal-content">
      <form id="form_id" method="" action="" onsubmit="return false" >
       <ul>
        <li>
          <label for="work">Atividade:
          <input type="number" name="work" id="work_time" value="25" />
          </label>
        </li>
        <li>
          <label for="break">Intervalo Curto：
          <input type="number" name="break" id="break_time" value="5" />
          </label>
        </li>
        <li>
          <label for="longbreak">Intervalo Longo：
          <input type="number" name="longbreak" id="longbreak_time" value="20" />
          </label>
        </li>
        <li>
          <label for="cycle">Ciclo：
          <input type="number" name="cycle" id="cycle_count" value="4" />
          </label>
        </li>
        <button type="submit" class="modal-close waves-effect waves-light btn-flat" id="submit_btn"><i class="material-icons left">save</i>Salvar</button>
      </ul>
    </form>
    <button class="modal-close waves-effect waves-light btn-flat"><i class="material-icons left">cancel</i>Cancelar</button>
  </div>
</div>
<div id="modal-tarefa" class="modal">
    <div class="modal-content">
        <h4>Criar Tarefas</h4>
        <form class="col s12" id="pomodoro.php" action="criartarefas.php" method="POST" class="">
            <div class="row">
            <div class="input-field col s6">
                    <i class="material-icons prefix">event_note</i>
                    <input type="text" name="nome"  class="validate">
                    <label for="nome">Nome</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">add_alarm</i>
                    <input type="number" name="previsto" class="validate">
                    <label for="previsto">Pomodoro Previsto</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">date_range</i>
                    <input value="0" type="date" name="data" class="validate">
                    <label for="data">Data Limite da Tarefa</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">add_alarm</i>
                    <input value="0" type="time" name="Atividade" class="validate">
                    <label for="time">Horario da atividade</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">access_alarms</i>
                    <input value="0" type="time" name="intervalo" class="validate">
                    <label for="time">Horario de intervalo</label>
                </div>
            </div>
            <button type="submit" class="modal-close waves-effect waves-light btn-flat" id="submit_btn"><i class="material-icons left">save</i>Salvar</button>
        </form>
    <button class="modal-close waves-effect waves-light btn-flat"><i class="material-icons left">cancel</i>Cancelar</button>
    </div>
</div>
<main id="conteudo" class="row">
    <div class="col s10 offset-s1">
        <div class="row linha-logomarca">
            <div class="col s4">
                    <!--img src="./assets/logo.svg" alt="Logomarca"-->
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light btn-large modal-trigger" data-target="modal-tarefa" type="button">
                        Criar Tarefas
                        <i class="material-icons right">event_note</i>
                    </button>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light btn-large modal-trigger" data-target="modal-configurar-tempo" type="button">
                        Customizar Tempo
                        <i class="material-icons right">alarm</i>
                    </button>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light btn-large modal-trigger" data-target="modal-info" type="button">
                        O que é Pomodoro?
                        <i class="material-icons right">help</i>
                    </button>
                </div>
            </div>
                <div class="container">
    <div id="timer"></div>
    <p id="timeState"></p>
    <p id="cycle"></p>
    <div class="controls">
      <button class="btn material-icons right"  id="start">play_circle_filled</button>
      <button class="btn material-icons right"  id="stop">pause_circle_filled</button>
      <button class="btn material-icons right" id="reset">restore</button>
    </div>
    <ul class="edit_display">
      <li>Atividade<span class="mgr_1"></span><span id="input_worktime"></span>min</li>
      <li>Intervalo Curto<span class="mgr_1"></span><span id="input_breaktime"></span>min</li>
      <li>Intervalo Longo<span class="mgr_1"></span><span id="input_longbreaktime"></span>min</li>
      <li>Ciclo<span id="input_cyclecount"></span>vezes</li>
    </ul>
    <span class="card-title">Tarefas do mês</span>
       <hr>
                <?php
                        include("conecta.php");
                        $sql = mysqli_query($conn, "SELECT * from tarefa where month(data) = month(CURRENT_DATE())");
                        while($calendario = mysqli_fetch_array($sql)){
                            $id = $calendario['id'];
                            echo "<a href='tarefaver.php?id=$id'>".$calendario['nome']."</a>&nbsp;&nbsp;&nbsp;&nbsp;";
                            $data = date_create($calendario['data']);
                            echo date_format($data, 'd/m/Y');
                            echo "<br/>";
                        }
                        mysqli_close($conn);
                    ?>
                </div>    
        </div>
        </div>
  </div>
    <script src="pomodoro.js"></script>
</body>
</html>