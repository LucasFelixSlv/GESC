<?php

    if(!empty($_GET['idEvento'])){

        include_once('connect.php');

        $idEvento = $_GET['idEvento'];

        $sqlSelect = "SELECT * FROM eventos WHERE idEvento=$idEvento";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            $sqlDelete = "DELETE FROM eventos WHERE idEvento = '".$_GET['idEvento']."'";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
   // header('Location: escolherEditar.php');

    ?>