<?php
//funções pra cadastro
function emptyInputSignup($usuario, $senha, $repetirSenha)
{
    $result = null;
    if (empty($usuario) || empty($senha) || empty($repetirSenha)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUser($usuario)
{
    $result = null;
    $padrao = '/^(?=.*[a-zA-Z].*[a-zA-Z])[a-zA-Z0-9_]{2,50}$/';
    if (!preg_match($padrao, $usuario) || strlen($usuario) < 2) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($senha, $repetirSenha)
{
    $result = null;
    if ($senha !== $repetirSenha) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function weakPassword($senha)
{
    $result = null;
    $uppercase = preg_match('@[A-Z]@', $senha);
    $lowercase = preg_match('@[a-z]@', $senha);
    $number    = preg_match('@[0-9]@', $senha);
    $specialChars = preg_match('@[^\w]@', $senha);



    if (strlen($senha) < 8 || !$uppercase || !$lowercase || !$number || !$specialChars) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function userExists($conexao, $usuario)
{
    $sql = "SELECT * FROM usuarios WHERE usuariosNome = ?;";
    $stmt = mysqli_stmt_init($conexao);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pagina_principal/cadastro.php?error=stmtfalhou");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $usuario);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}

function createUser($conexao, $usuario, $senha)
{
    $sql = "INSERT INTO usuarios (usuariosNome, usuariosSenha) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conexao);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../pagina_principal/cadastro.php?error=stmtfailed");
        exit();
    }

    $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $usuario, $hashedSenha);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    loginUser($conexao, $usuario, $senha);
}

//funções pra login

function emptyInputLogin($usuario, $senha)
{
    $result = null;
    if (empty($usuario) || empty($senha)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conexao, $usuario, $senha)
{
    $usuarioExiste = userExists($conexao, $usuario);

    if ($usuarioExiste === false) {
        header("location: ../pagina_principal/login.php?error=loginerrado");
        exit();
    }

    $hashedSenha = $usuarioExiste["usuariosSenha"];
    $verificarSenha = password_verify($senha, $hashedSenha);

    if ($verificarSenha === false) {
        header("location: ../pagina_principal/login.php?error=loginerrado");
        exit();
    } else if ($verificarSenha === true) {
        session_start();
        $_SESSION["usuariosId"] = $usuarioExiste["usuariosId"];
        $_SESSION["usuariosNome"] = $usuarioExiste["usuariosNome"];
        header("location: ../pagina_principal/index.php");
        exit();
    }
}

function userParticipation($usuariosId, $eventosId)
{
    include_once('dbh.inc.php');
    $sql = "INSERT INTO solicitacao (usuariosId, eventosId, aprovado) VALUES ('$usuariosId', '$eventosId', 'NÃO')";
    mysqli_query($conexao, $sql);
}

function userComment($participacaoId, $comentario, $nota)
{
    include_once('dbh.inc.php');
    $sql = "INSERT INTO avaliacoes (participacaoId, comentario, nota) VALUES ('$participacaoId', '$comentario', '$nota')";
    mysqli_query($conexao, $sql);
}
