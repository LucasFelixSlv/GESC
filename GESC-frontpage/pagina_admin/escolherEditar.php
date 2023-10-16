<?php

session_start();

if (isset($_SESSION["usuariosId"])) {

    $usuariosId = $_SESSION["usuariosId"];

    include_once('../includes/dbh.inc.php');

    // Buscar dados do evento

    $sql = "SELECT eventosId, nome, localEv, DATE_FORMAT(dataInicio, '%d/%m/%Y') AS data_formatada FROM `eventos` WHERE usuariosId ='$usuariosId'";
    $result = $conexao->query($sql);
    $dadosEvento = $result->fetch_assoc();

?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GESC - Admin</title>
        <link rel="apple-touch-icon" sizes="180x180" href="../assets/icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/icon/favicon-16x16.png">
        <link rel="manifest" href="../assets/icon/site.webmanifest">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/80372eb85e.js"></script>

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
        <div class="table-responsive m-4">
            <form action="editar.php" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="w-50">Nome do Evento</th>
                            <th scope="col">Local</th>
                            <th scope="col">Data</th>
                            <th scope="col">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $result->data_seek(0);

                        while ($dadosEvento = mysqli_fetch_assoc($result)) {

                        ?>

                            <tr>
                                <td><?= $dadosEvento['eventosId'] ?> </td>
                                <td class='text-break'><?= $dadosEvento["nome"] ?></td>
                                <td><?= $dadosEvento["localEv"] ?></td>
                                <td><?= $dadosEvento["data_formatada"] ?></td>
                                <td>

                                    <button type="submit" name="eventosId" value="<?= $dadosEvento['eventosId'] ?>" class="btn btn-default btnEdit">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>

                                    <button type="button" name="eventosId" class="btn btn-default btnDelete" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $dadosEvento['eventosId'] ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>

                                </td>
                            </tr>
                    </tbody>
            </form>


            <!--modal edit start-->
            <div class="modal fade" id="modalDelete<?= $dadosEvento['eventosId'] ?>" tabindex="-1" aria-labelledby="modalDelete<?= $dadosEvento['eventosId'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <form action="deletar.php" method="POST">
                                <input type="hidden" name='EventoIdDeletar' value="<?= $dadosEvento['eventosId'] ?>">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Deseja excluir esse evento?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                            <button type='submit' class='btn btn btn-danger'>Excluir</button>
                        </div>
                        </form>

                        <input type="hidden" value="<?= $idExclusao ?>">

                    <?php } ?>

                    </div>
                </div>
            </div>

            <link rel="stylesheet" href="styleAdmin.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>


    </html>
<?php
} else {
    header('location: ../pagina_principal/index.php');
}
