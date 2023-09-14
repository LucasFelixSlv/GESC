<?php

$hostname="localhost";
$username="root";
$password="root";
$dbname="gesc";

$conexao = mysqli_connect($hostname,$username, $password);
$sql = mysqli_select_db($conexao, $dbname);

if(!$conexao) {
  die("Conexão falhou" .mysqli_connect_error() );
}

?>
