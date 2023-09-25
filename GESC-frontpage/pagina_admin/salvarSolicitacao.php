<?php 
     include_once('../includes/dbh.inc.php');

     if(isset($_POST['atualizar'])){

        $idUser = $_POST['idUser'];
        $aprovado = $_POST['aprovado'];

        $sqlUpdateSolicitacao = "UPDATE aceiteEvento SET aprovado='Sim'";

        $resultado = $conexao->query($sqlUpdateSolicitacao);

     }
     header('Location: solicitacoes.php');
