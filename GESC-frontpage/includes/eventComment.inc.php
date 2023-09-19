<?php

if (isset($_POST["enviar"])) {
    include('functions.inc.php');
    $participacaoId = $_POST["participacaoId"];
    $comentario = $_POST["comentario"];
    $linkEvento = $_POST["linkEvento"];

    (userComment($participacaoId, $comentario));
    header("location: ../pagina_principal/evento.php?id=$linkEvento");
}
