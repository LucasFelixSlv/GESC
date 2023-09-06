<?php

include 'connect.php';

if(isset($_POST['adicionar'])){

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $localEv = $_POST['localEv'];
    $dataEv = $_POST['dataEv'];
    $inicio = $_POST['inicio'];
    $termino = $_POST['termino'];
    $imagem = $_POST['imagem'];

  }

  $sql = "INSERT INTO `evento` (nome, descricao, localEv, dataEv, inicio, termino, imagem) VALUES ('$nome', '$descricao', '$localEv', '$dataEv', '$inicio', '$termino', '$imagem')";

  $rs = mysqli_query($conexao, $sql);
  
?>