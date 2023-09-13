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
        echo $aux["nome"];
    } else{
        echo "Nenhum evento registrado com este link.";
    }

} else {
    header('Location: index.php');
}

include_once 'footer.php';
?>