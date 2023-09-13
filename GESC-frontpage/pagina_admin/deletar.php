<?php

    if(!empty($_GET['eventosId'])){

        include_once('../includes/dbh.inc.php');

        $eventosId = $_GET['eventosId'];

        $sqlSelect = "SELECT * FROM eventos WHERE eventosId=$eventosId";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM eventos WHERE eventosId = '".$_GET['eventosId']."'";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
   // header('Location: escolherEditar.php');
