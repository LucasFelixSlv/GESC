<?php

session_start();
include_once('../includes/dbh.inc.php');

if (!empty($_GET['idEvento'])) {

    $idEvento = $_GET['idEvento'];

    $sqlSelect = "SELECT * FROM `eventos` WHERE idEvento='$idEvento'";

    $result = $conexao->query($sqlSelect);

    if ($result->num_rows > 0) {

        while ($dadosEvento = mysqli_fetch_assoc($result)) {

            $idEvento = $dadosEvento['idEvento'];
            $nome = $dadosEvento['nome'];
            $descricao = $dadosEvento['descricao'];
            $localEv = $dadosEvento['localEv'];
            $dataEv = $dadosEvento['dataEv'];
            $inicio = $dadosEvento['inicio'];
            $termino = $dadosEvento['termino'];
            $imagem = $dadosEvento['imagem'];
        }
    } else {
        header('Location: editar.php');
    }
}

?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESC - Admin</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/icon/favicon-16x16.png">
    <link rel="manifest" href="../assets/icon/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <header class="bg-black text-white text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Administração</h1>
                </div>
            </div>
        </div>
    </header>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="adicionar.php">Adicionar novo Evento</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="escolherEditar.php">Editar Evento</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="avaliacoes.php">Ver Avaliações</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="solicitacoes.php">Aprovar Solicitações</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="../pagina_principal/index.php">Início</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->

    <form action="salvarRegistroEditado.php" method="POST">

        <div class="container">
            <div class="row">
                <h1 class="display-5 text-center">Editar Evento</h1>
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="nome" class="form-label">Evento:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>">

            </div>
        </div>


        <div class="container">
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="2"><?php echo $descricao ?></textarea>
            </div>
        </div>


        <div class="container">
            <div class="mb-3">
                <label for="local" class="form-label">Local:</label>
                <input type="text" class="form-control" id="localEv" name="localEv" value="<?php echo $localEv ?>">

            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="data" class="form-label">Data:</label>
                <input type="date" class="form-control" id="data" name="dataEv" value="<?php echo $dataEv ?>">
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="horario-inicio" class="form-label">Início do Evento:</label>
                <input type="time" class="form-control" id="horario-inicio" name="inicio" value="<?php echo $inicio ?>">
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="horario-termino" class="form-label">Término do Evento:</label>
                <input type="time" class="form-control" id="horario-termino" name="termino" value="<?php echo $termino ?>">
            </div>
        </div>

        <input type="hidden" name="idEvento" value="<?php echo $idEvento ?>">

        <div class="container">
            <div class="mb-3">
                <label for="imageInput" class="form-label">Alterar imagem do Evento:</label>
                <input type="file" class="form-control-file" id="imageInput" name="imagem" value="<?php echo $imagem ?>">
            </div>
        </div>

        <div class="container">

            <div class="col text-end">
                <input type="hidden" name="idEvento" value="<?php echo $idEvento ?>">
                <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success mb-4">Salvar Alterações</button>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Deseja salvar alterações?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" name="update" class="btn btn btn-success">Salvar Alterações</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <?php
    $conexao->close();
    ?>

    <link rel="stylesheet" href="styleAdmin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>