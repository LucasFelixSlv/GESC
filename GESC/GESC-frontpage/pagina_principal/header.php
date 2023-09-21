<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GESC</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icon/favicon-16x16.png">
    <link rel="manifest" href="../assets/icon/site.webmanifest">
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="../styles/style.css" type="text/css" rel="stylesheet">
</head>
<body>
        <nav class="sticky-top navbarBg navbar navbar-expand-lg navbar-dark">
            <a href="index.php" class="navbarGesc navbar-brand col-3 col-md col-lg">
                GESC
            </a>
            <div class="form-outline col-4 col-md-8 col-lg-5">
                <form action="search.php" method="post">
                    <input type="search" id="search" name="pesquisarEvento" class="form-control" placeholder="Pesquisar evento" aria-label="Search" />
                </form>
            </div>
            <button class="navbarBotaoMob navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon format-button"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav col-lg-12">
                    <div class="fundoNavbarBotao col-lg-6">
                        <?php
                        if (isset($_SESSION["usuariosId"])) {
                            echo "<a class='navbarBotao' href='../pagina_admin/adicionar.php'>CRIAR EVENTO</button>";
                            echo "</div>";
                            echo "<div class='fundoNavbarBotao col-lg-6 dropdown'>";
                            echo "<a class='navbarBotao' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>MINHA CONTA</a>";
                            echo "<div class='dropdown-menu dropdownOptions'>";
                            echo "<a class='dropdown-item' type='button' href='../pagina_admin/escolherEditar.php'>Painel de controle</a>";
                            echo "<a class='dropdown-item' type='button' href='../pagina_admin/solicitacoes.php'>Notificações</a>";
                            echo "<a href='../includes/logout.inc.php' class='dropdown-item'>Sair</a>";
                            echo "</div>";
                        } else {
                            echo "<a class='navbarBotao acessarConta' href='login.php'>ACESSE SUA CONTA</a>";
                            echo "</div>";
                            echo "<div class='fundoNavbarBotao col-lg-6'>";
                            echo "<a class='navbarBotao criarConta' href='cadastro.php'>CADASTRE-SE</a>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>