<?php
    $tipo =  $_SESSION["tipo"];
    if($tipo === "admin"){
        echo "<li><a href='crud.php'>Usuário</a></li>";
    }
?>
</div>