<?php

$hostname="localhost";
$username="root";
$password="";
$dbname="gesc";

$conexao = new mysqli($hostname,$username,$password,$dbname);

// Check connection
if ($conexao -> connect_errno) {
  echo "falha ao conectar: " . $conexao -> connect_error;
  exit();
}
?>