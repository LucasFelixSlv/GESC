<?php

if (isset($_POST["entrar"])){

    $usuario = $_POST["nomeUsuario"];
    $senha = $_POST["senhaUsuario"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputLogin($usuario, $senha) !== false){
        header("location: ../pagina_principal/login.php?error=campovazio");
        exit();
    }

    loginUser($conexao, $usuario, $senha);

}else{
    header("location: ../pagina_principal/index.php");
    exit();
}