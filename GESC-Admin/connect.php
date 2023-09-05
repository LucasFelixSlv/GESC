<?php

$hostname="localhost";
$username="root";
$password="";
$dbname="gesc";

$conexao = mysqli_connect($hostname,$username, $password, $dbname);
$sql = mysqli_select_db($conexao, $dbname);

if(!$conexao) {
  die("Conexão falhou" .mysqli_connect_error() );
}

?>
