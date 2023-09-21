<?php

if (isset($_POST["enviar"])) {
    include('functions.inc.php');
    $participacaoId = $_POST["participacaoId"];
    $comentario = $_POST["comentario"];
    $linkEvento = $_POST["linkEvento"];
    $nota = $_POST["nota"];

    (userComment($participacaoId, $comentario, $nota));
    header("location: ../pagina_principal/evento.php?id=$linkEvento");
}
