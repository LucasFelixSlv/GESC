<?php

$hostname="127.0.0.1";
$username="root";
$password="root";
$dbname="gesc";

$conexao = mysqli_connect($hostname, $username, $password, $dbname);
$sql = mysqli_select_db($conexao, $dbname);

if (!$conexao){
    die("Conexão falhou" . mysqli_connect_error());
}