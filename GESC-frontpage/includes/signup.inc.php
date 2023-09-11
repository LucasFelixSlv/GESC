<?php

if (isset($_POST["cadastrar"])){
    
    $usuario = $_POST["nomeUsuario"];
    $senha = $_POST["senhaUsuario"];
    $repetirSenha = $_POST["repetirSenhaUsuario"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($usuario, $senha, $repetirSenha) !== false){
        header("location: ../pagina_principal/index.php?error=campovazio");
        exit();
    }

    if(invalidUser($usuario) !== false){
        header("location: ../pagina_principal/index.php?error=usuarioinvalido");
        exit();
    }

    if(passwordMatch($senha, $repetirSenha) !== false){
        header("location: ../pagina_principal/index.php?error=senhadiferente");
        exit();
    }

    if(weakPassword($senha) !== false){
        header("location: ../pagina_principal/index.php?error=senhafraca");
        exit();
    }

    if(userExists($conexao, $usuario) !== false){
        header("location: ../pagina_principal/index.php?error=usuarioexistente");
        exit();
    }

    createUser($conexao, $usuario, $senha);

}else{
    header("location: ../pagina_principal/index.php");
    exit();
}