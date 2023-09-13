<?php
    include_once('../includes/dbh.inc.php');

    if(isset($_POST['update'])){

        $eventosId = $_POST['idEvento'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $localEv = $_POST['localEv'];
        $dataEv = $_POST['dataEv'];
        $inicio = $_POST['inicio'];
        $termino = $_POST['termino'];
        $imagem = $_POST['imagem'];

        $sqlUpdate = "UPDATE eventos SET nome='$nome', descricao='$descricao', localEv='$localEv', 
                        dataEv='$dataEv', inicio='$inicio', termino='$termino', imagem='$imagem' WHERE eventosId='$eventosId'";

        $result = $conexao->query($sqlUpdate);

    }
    header('Location: escolherEditar.php');
