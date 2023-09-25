<?php

use LDAP\Result;

session_start();
if (isset($_SESSION["usuariosId"])) {

    include_once('../includes/dbh.inc.php');

    // Buscar dados do evento

    $sql = "SELECT usuarios.usuariosNome, avaliacoes.comentario FROM `avaliacoes` INNER JOIN participacao_eventos ON avaliacoes.participacaoId = participacao_eventos.participacaoId INNER JOIN usuarios ON participacao_eventos.usuariosId = usuarios.usuariosId ORDER BY avaliacoesId ASC";
    $result = $conexao->query($sql);
    $dadosComents = $result->fetch_assoc();
    $result->data_seek(0);
} else {
    header("location: ../pagina_principal/index.php");
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


    <!-- Menu Lateral -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
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

    <div class="container">
        <h1 class="display-5 text-center">Minhas Avaliações</h1>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Avaliação do seu Evento</h5>

                <div class="rating">
                    <span class="star" data-star="1">&#9733;</span>
                    <span class="star" data-star="2">&#9733;</span>
                    <span class="star" data-star="3">&#9733;</span>
                    <span class="star" data-star="4">&#9733;</span>
                    <span class="star" data-star="5">&#9733;</span>
                </div>
                <p>Média de Avaliação: <span id="media-avaliacao">0.0</span></p>
            </div>
        </div>
    </div>

    <?php

    while ($dadosComents = mysqli_fetch_assoc($result)) {

        echo "<div class='container'>
            <div class='mb-3'>
                <textarea class='form-control mt-4' id='descricao' rows='4'> $dadosComents[comentario]</textarea>
            </div>
        </div>'";
    }
    ?>

    <link rel="stylesheet" href="styleAdmin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>


</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let rating = 0;
        const $stars = $('.star');
        const $mediaAvaliacao = $('#media-avaliacao');

        // Manipula o clique nas estrelas
        $stars.on('click', function() {
            const selectedStar = $(this).data('star');
            rating = selectedStar;
            updateRating();
        });

        // Atualiza a média de avaliação
        function updateRating() {
            $mediaAvaliacao.text(rating.toFixed(1));
        }
    });
</script>