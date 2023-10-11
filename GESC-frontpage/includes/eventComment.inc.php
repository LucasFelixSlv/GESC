<?php

if (isset($_POST["enviar"])) {
    include('functions.inc.php');
    $solicitacaoId = $_POST["solicitacaoId"];
    $comentario = $_POST["comentario"];
    $linkEvento = $_POST["linkEvento"];
    $nota = $_POST["nota"];
    if ($nota < 1 || $nota > 5 || ($nota % 1 != 0)) {
        header("location: ../pagina_principal/evento.php?id=$linkEvento");
        die;
    }
    if (empty($comentario)) {
        header("location: ../pagina_principal/evento.php?id=$linkEvento");
        die;
    }
    (userComment($solicitacaoId, $comentario, $nota));
    header("location: ../pagina_principal/evento.php?id=$linkEvento");
} else {
    header("location: ../pagina_principal/index.php");
}
