<?php
include_once('../includes/dbh.inc.php');

if (isset($_POST['solicitacaoId'])) {

   $solicitacaoId = $_POST['solicitacaoId'];
   $usuariosId = $_POST['usuariosId'];
   $eventosId = $_POST['eventosId'];
   $aprovado = $_POST['aprovado'];

   $sqlUpdateSolicitacao = "UPDATE solicitacao 
                                 SET aprovado = 'SIM'
                                 WHERE solicitacaoId='$solicitacaoId';";
   mysqli_query($conexao, "INSERT INTO participacao_eventos (usuariosId, eventosId) VALUES ('$usuariosId', '$eventosId')");

   $result = $conexao->query($sqlUpdateSolicitacao);
}

header("Location: solicitacoes.php");
