<?php

session_start();
if (isset($_SESSION["usuariosId"])) {
    include_once('../includes/dbh.inc.php');

<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
    if (!empty($_GET['eventosId'])) {

        $eventosId = $_GET['eventosId'];

        $sqlSelect = "SELECT * FROM `eventos` WHERE eventosId='$eventosId'";

        $result = $conexao->query($sqlSelect);

        if ($result->num_rows > 0) {

            while ($dadosEvento = mysqli_fetch_assoc($result)) {

                $eventosId = $dadosEvento['eventosId'];
=======
if (isset($_SESSION["usuariosId"])) {

    include_once('../includes/dbh.inc.php');

    if (!empty($_POST['eventosId'])) {

        $eventosId = $_POST['eventosId'];

        $sqlSelect = "SELECT * FROM `eventos` WHERE eventosId='$eventosId'";

        $result = $conexao->query($sqlSelect);

        if ($result->num_rows > 0) {

            while ($dadosEvento = mysqli_fetch_assoc($result)) {

                $eventosId = $dadosEvento['eventosId'];
                $usuariosId = $dadosEvento['usuariosId'];
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php
                $nome = $dadosEvento['nome'];
                $descricao = $dadosEvento['descricao'];
                $localEv = $dadosEvento['localEv'];
                $dataInicio = $dadosEvento['dataInicio'];
                $dataTermino = $dadosEvento['dataTermino'];
                $horaInicio = $dadosEvento['horaInicio'];
                $horaTermino = $dadosEvento['horaTermino'];
                $imagem = $dadosEvento['imagem'];
<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
=======
                $link = $dadosEvento['link'];
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php
            }
        } else {
            header('Location: editar.php');
        }
    }
<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
} else {
    header("location: ../pagina_principal/index.php");
}
=======
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php
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
<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
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
=======
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
                            <a class="nav-link" href="editar.php">Editar Evento</a>
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
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php
            </div>
        </nav>

        <!-- Conteúdo Principal -->

<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
    <form action="salvarRegistroEditado.php" method="POST">
=======
        <form action="salvarRegistroEditado.php" method="POST" enctype="multipart/form-data">
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php

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

<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
        <div class="container">
            <div class="mb-3">
                <label for="data" class="form-label">Data começo:</label>
                <input type="date" class="form-control" id="data" name="dataInicio" value="<?php echo $dataInicio ?>">
=======
            <?php

            date_default_timezone_set('America/Sao_Paulo');
            $dataAtual = date('d/m/y');

            ?>


            <div class="container">
                <div class="mb-3">
                    <label for="dataInicio" class="form-label md-input-wrapper">Data de Inicio:</label>
                    <input type="date" class="form-control" id="dataInicio" name="dataInicio" value="<?php echo $dataInicio ?>" min="<?php echo  date('Y-m-d'); ?>">
                </div>
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php
            </div>

<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
        <div class="container">
            <div class="mb-3">
                <label for="data" class="form-label">Data fim:</label>
                <input type="date" class="form-control" id="data" name="dataTermino" value="<?php echo $dataTermino ?>">
=======
            <div class="container">
                <div class="mb-3">
                    <label for="dataTermino" class="form-label md-input-wrapper">Data de Término:</label>
                    <input type="date" class="form-control" id="dataTermino" name="dataTermino" value="<?php echo $dataTermino ?>" min="<?php echo  date('Y-m-d'); ?>">
                </div>
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php
            </div>

            <div class="container">
                <div class="mb-3">
                    <label for="horario-inicio" class="form-label">Início do Evento:</label>
                    <input type="time" class="form-control" id="horario-inicio" name="horaInicio" value="<?php echo $horaInicio ?>">
                </div>
            </div>

            <div class="container">
                <div class="mb-3">
                    <label for="horario-termino" class="form-label">Término do Evento:</label>
                    <input type="time" class="form-control" id="horario-termino" name="horaTermino" value="<?php echo $horaTermino ?>">
                </div>
            </div>

<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
        <input type="hidden" name="idEvento" value="<?php echo $idEvento ?>">

        <div class="container">
            <div class="mb-3">
                <label for="imageInput" class="form-label">Alterar imagem do Evento:</label>
                <input type="file" class="form-control-file" id="imageInput" name="imagem" value="<?php echo $imagem ?>">
=======
            <div class="container">
                <div class="mb-3">
                    <label for="imageInput" class="form-label">Alterar imagem do Evento:</label>
                    <input type="file" class="form-control-file" id="imageInput" name="imagem" required>
                </div>
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php
            </div>

<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/editar.php
        <div class="container">

            <div class="col text-end">
                <input type="hidden" name="idEvento" value="<?php echo $eventosId ?>">
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
=======
            <input type="hidden" name="eventosId" value="<?php echo $eventosId ?>">

            <div class="container">
                <div class="col text-end">
                    <input type="hidden" name="eventosId" value="<?php echo $eventosId ?>">
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
                            <input type="hidden" name="EventosIdUpdate" value="<?= $dadosEvento['eventosId'] ?>">
                            <button type="submit" name="update" class="btn btn btn-success">Salvar Alterações</button>
                        </div>
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/editar.php
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
<?php
} else {
    header('location: ../pagina_principal/index.php');
}
