<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../styles/index.css" type="text/css" rel="stylesheet">
</head>
<body>
        <nav class="sticky-top navbarBg navbar navbar-expand-lg navbar-dark">
            <a href="index.php" class="navbarGesc navbar-brand col-3 col-md col-lg">
                GESC
            </a>
            <div class="form-outline col-4 col-md-8 col-lg-5">
                <input type="search" id="form1" class="form-control" placeholder="Pesquisar evento" aria-label="Search" />
            </div>
            <button class="navbarBotaoMob navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon format-button"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav col-lg-12">
                    <div class="fundoNavbarBotao col-lg-6">
                        <?php
                        if (isset($_SESSION["usuariosId"])) {
                            echo "<a class='navbarBotao' href='../../GESC-Admin/adicionar.php'>CRIAR EVENTO</button>";
                            echo "</div>";
                            echo "<div class='fundoNavbarBotao col-lg-6 dropdown'>";
                            echo "<a class='navbarBotao' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>MINHA CONTA</a>";
                            echo "<div class='dropdown-menu dropdownOptions'>";
                            echo "<button class='dropdown-item' type='button'>Dashboard</button>";
                            echo "<button class='dropdown-item' type='button'>Notificações</button>";
                            echo "<a href='../includes/logout.inc.php' class='dropdown-item'>Sair</a>";
                            echo "</div>";
                        } else {
                            echo "<button class='navbarBotao acessarConta'>ACESSE SUA CONTA</button>";
                            echo "</div>";
                            echo "<div class='fundoNavbarBotao col-lg-6'>";
                            echo "<button class='navbarBotao criarConta'>CADASTRE-SE</button>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>
        <div class="wrapperBackground">
            <div class="wrapper">
                <span class="iconClose"><ion-icon name="close"></ion-icon></span>
                <div class="formBox login">
                    <h2>Login</h2>
                    <form method="post" action="../includes/login.inc.php">
                        <div class="inputBox">
                            <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="text" name="nomeUsuario" placeholder=" " tabindex="-1" required>
                            <label>Usuário</label>
                        </div>
                        <div class="inputBox">
                            <span class="icon"><i class="fa fa-eye-slash" aria-hidden="true" id="olhoLogin" onclick="toggle()"></i></span>
                            <input type="password" name="senhaUsuario" id="senhaLogin" placeholder=" " tabindex="-1" required>
                            <label>Senha</label>
                        </div>
                        <button type="submit" class="loginBtn" tabindex="-1" name="entrar">ENTRAR</button>
                        <div class="loginSignup">
                            <p>Não possui uma conta? <button class="signupLink" type="button" tabindex="-1">Cadastre-se!</button></p>
                        </div>
                    </form>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "campovazio") {
                            echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Por favor, preencha todos os campos!</p><button type='button' tabindex='-1' class='confirmarMsg' name='fecharMsg'>OK</button></div></div>";
                        } else if ($_GET["error"] == "loginerrado") {
                            echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Login errado, por favor verifique o nome de usuário e senha!</p><button type='button' tabindex='-1' class='confirmarMsg' name='fecharMsg'>OK</button></div></div>";
                        }
                    }
                    ?>
                </div>

                <div class="formBox signup">
                    <h2>Cadastro</h2>
                    <form method="post" action="../includes/signup.inc.php">
                        <div class="inputBox">
                            <span class="icon"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <input type="text" name="nomeUsuario" placeholder=" " tabindex="-1" required>
                            <label>Usuário</label>
                        </div>
                        <div class="inputBox">
                            <span class="icon"><i class="fa fa-eye-slash" aria-hidden="true" id="olhoSignup" onclick="toggle()"></i></span>
                            <input type="password" name="senhaUsuario" id="senhaSignup" placeholder=" " tabindex="-1" required>
                            <label>Senha</label>
                        </div>
                        <div class="inputBox">
                            <span class="icon"><i class="fa fa-eye-slash" aria-hidden="true" id="olhoConfirmar" onclick="toggle()"></i></span>
                            <input type="password" name="repetirSenhaUsuario" id="senhaConfirmar" placeholder=" " tabindex="-1" required>
                            <label>Confirmar senha</label>
                        </div>
                        <button type="submit" class="loginBtn" tabindex="-1" name="cadastrar">CADASTRAR</button>
                        <div class="loginSignup">
                            <p>Já possui uma conta? <button class="loginLink" type="button" tabindex="-1">Faça login!</button></p>
                        </div>
                    </form>
                    <?php
                    if (isset($_GET["error"])) {
                        if ($_GET["error"] == "campovazio") {
                            echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Por favor, preencha todos os campos!</p><button type='button' tabindex='-1' class='confirmarMsg' name='fecharMsg'>OK</button></div></div>";
                        } else if ($_GET["error"] == "usuarioinvalido") {
                            echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Por favor, escolha um nome de usuário válido! (Deve conter pelo menos 2 letras, pode conter números e '_'.)</p><button type='button' tabindex='-1' class='confirmarMsg' name='fecharMsg'>OK</button></div></div>";
                        } else if ($_GET["error"] == "senhadiferente") {
                            echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Suas senhas não são idênticas, por favor confira novamente!</p><button type='button' tabindex='-1' class='confirmarMsg' name='fecharMsg'>OK</button></div></div>";
                        } else if ($_GET["error"] == "senhafraca") {
                            echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Sua senha deve possuir: pelo menos 8 caracteres, pelo menos uma letra maiúscula, um número e um caractere especial!</p><button type='button' tabindex='-1' class='confirmarMsg' name='fecharMsg'>OK</button></div></div>";
                        } else if ($_GET["error"] == "stmtfalhou") {
                            echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Algo deu errado, por favor tente novamente!</p><button type='button' tabindex='-1' class='confirmarMsg' name='fecharMsg'>OK</button></div></div>";
                        } else if ($_GET["error"] == "usuarioexistente") {
                            echo "<div class='wrapperMsgErro'><div class='msgErro'><p>Usuário já existente, por favor insira outro nome!</p><button type='button' tabindex='-1' class='confirmarMsg' name='fecharMsg'>OK</button></div></div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>