<?php
session_start();
include_once('../includes/dbh.inc.php');

if (isset($_SESSION["usuariosId"])) {

   if (isset($_POST['usuariosId'])) {

      $usuariosId  = $_POST['usuariosId'];
      $eventosId   = $_POST['eventosId'];
      $aprovado    = $_POST['aprovado'];

      $sqlUpdateTodos = "UPDATE solicitacao 
                        INNER JOIN eventos
                        ON eventos.eventosId = solicitacao.eventosId
                        SET aprovado = 'Sim'
                        WHERE eventos.usuariosId='$usuariosId';";

      $result = $conexao->query($sqlUpdateTodos);
   }

   header("Location: solicitacoes.php");

?>

<?php
   include_once('../includes/dbh.inc.php');

   if (isset($_POST['solicitacaoId'])) {

      $solicitacaoId = $_POST['solicitacaoId'];
      $usuariosId    = $_POST['usuariosId'];
      $eventosId     = $_POST['eventosId'];
      $aprovado      = $_POST['aprovado'];

      $sqlUpdateSolicitacao = "UPDATE solicitacao 
                                 SET aprovado = 'Sim'
                                 WHERE solicitacaoId='$solicitacaoId';";
      $result = $conexao->query($sqlUpdateSolicitacao);
   }

   header("Location: solicitacoes.php");
} else {
   header('location: ../pagina_principal/index.php');
}

?>