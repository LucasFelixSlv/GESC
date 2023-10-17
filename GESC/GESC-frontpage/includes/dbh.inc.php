<?php

$hostname="localhost";
$username="root";
$password="root";
$dbname="gesc2";

$conexao = new mysqli($hostname,$username,$password,$dbname);
$sql = mysqli_select_db($conexao, $dbname);

// Check connection
if ($conexao -> connect_errno) {
  echo "falha ao conectar: " . $conexao -> connect_error;
  exit();
}
