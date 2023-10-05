<?php
include_once('../includes/dbh.inc.php');

if (isset($_POST['solicitacaoId'])) {

   $solicitacaoId = $_POST['solicitacaoId'];
   $usuariosId = $_POST['usuariosId'];
   $eventosId = $_POST['eventosId'];
   $aprovado = $_POST['aprovado'];

   $sqlUpdateSolicitacao = "UPDATE solicitacao 
                                 SET aprovado = 'Sim'
                                 WHERE solicitacaoId='$solicitacaoId';";

   $result = $conexao->query($sqlUpdateSolicitacao);
}

header("Location: solicitacoes.php");
