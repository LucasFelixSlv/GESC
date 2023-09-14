<?php
    include_once('../includes/dbh.inc.php');

    if(isset($_POST['update'])){

        $eventosId = $_POST['idEvento'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $localEv = $_POST['localEv'];
        $dataInicio = $_POST['dataInicio'];
        $dataTermino = $_POST['dataTermino'];
        $horaInicio = $_POST['horaInicio'];
        $horaTermino = $_POST['horaTermino'];
        $imagem = $_POST['imagem'];

        $sqlUpdate = "UPDATE eventos SET nome='$nome', descricao='$descricao', localEv='$localEv', 
                        dataInicio='$dataInicio', dataTermino='$dataTermino', horaInicio='$horaInicio', horaTermino='$horaTermino', imagem='$imagem' WHERE eventosId='$eventosId'";

        $result = $conexao->query($sqlUpdate);

    }
    header('Location: escolherEditar.php');
