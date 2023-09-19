<?php

if(isset($_POST["participar"])){
    include('functions.inc.php');
    $usuariosId = $_POST["usuariosId"];
    $eventosId = $_POST["eventosId"];
    $linkEvento = $_POST["linkEvento"];

(userParticipation($usuariosId, $eventosId));
    header("location: ../pagina_principal/evento.php?id=$linkEvento");
}