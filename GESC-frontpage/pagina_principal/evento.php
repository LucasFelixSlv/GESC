<?php
include_once 'header.php';

if (isset($_GET['id'])){
    include_once '../includes/dbh.inc.php';
    $linkEvento = $_GET['id'];
    $linkEvento = mysqli_real_escape_string($conexao, $linkEvento);
    $result = mysqli_query($conexao, "SELECT * FROM eventos WHERE link = '$linkEvento'");

    if(mysqli_num_rows($result) > 0){
        $sql = mysqli_query($conexao, "SELECT * FROM eventos WHERE link = '$linkEvento'");
        $aux = mysqli_fetch_assoc($sql);

        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date('d/m/Y');

        $dataTermino = new DateTime($aux["dataTermino"]);
        $dataTermino = date_format($dataTermino, "d/m/Y");

        if($dataAtual < $dataTermino){
            //o usuário ainda pode solicitar participação
            echo '<br>Você pode solicitar participação!';
        }else if($dataAtual >= $dataTermino){
            //o usuário não pode mais solicitar participação
            echo '<br>Você não pode solicitar participação!';
        }

    } else{
        echo "Nenhum evento registrado com este link.";
    }

} else {
    header('Location: index.php');
}

include_once 'footer.php';
