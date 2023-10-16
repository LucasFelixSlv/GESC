<?php
include_once 'header.php';

if (isset($_GET['id'])) {
    include_once '../includes/dbh.inc.php';
    $linkEvento = $_GET['id'];
    if (isset($_SESSION["usuariosId"])) {
        $usuariosId = $_SESSION["usuariosId"];
    }
    $linkEvento = mysqli_real_escape_string($conexao, $linkEvento);
    $result = mysqli_query($conexao, "SELECT * FROM eventos WHERE link = '$linkEvento'");

    if (mysqli_num_rows($result) > 0) {
        $sql = mysqli_query($conexao, "SELECT * FROM eventos WHERE link = '$linkEvento'");
        $aux = mysqli_fetch_assoc($sql);

        $eventosId = $aux["eventosId"];

        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = new DateTime();
        $dataTermino = new DateTime($aux["dataTermino"]);
        $dataAtualFormat = date_format($dataAtual, "d/m/Y");
        $dataTerminoFormat = date_format($dataTermino, "d/m/Y");

        $dataInicio = new DateTime($aux["dataInicio"]);
        $dataInicio = date_format($dataInicio, "d/m/Y");
        //
        //Aqui fica os detalhes do evento
        //

?>
        <div class="bannerEvento">
            <img class="imgDetalheFundo" src="<?= $aux["imagem"] ?>" alt="<?= $aux["nome"] ?>" />
            <img class="imgDetalhe" src="<?= $aux["imagem"] ?>" alt="<?= $aux["nome"] ?>" />
        </div>
        <?php

        $sqlSolicitacao = mysqli_query($conexao, "SELECT usuariosId FROM solicitacao WHERE eventosId = '$eventosId'");

        if ($dataAtual < $dataTermino) {
            //o usuário ainda pode solicitar participação

            echo '<br>Você pode solicitar participação!';
            //verifica se o usuário está logado e se o usuário não é o criador do evento
            if (isset($usuariosId) && $usuariosId != $aux["usuariosId"]) {
                if (mysqli_num_rows($sqlSolicitacao) > 0) {
                    echo '<p>Solicitação enviada!</p>'; //mensagem dizendo que a solicitação ja foi enviada
                } else { //se a solicitação ainda nao foi enviada, será mostrado um botão para solicitar
        ?>
                    <form action="../includes/eventParticipation.inc.php" method="post">
                        <input type="hidden" name="usuariosId" value="<?= $usuariosId ?>">
                        <input type="hidden" name="eventosId" value="<?= $aux["eventosId"] ?>">
                        <input type="hidden" name="linkEvento" value="<?= $linkEvento ?>">
                        <button type="submit" name="participar">Solicitar participação</button>
                    </form>
                <?php
                }
            } else if (!isset($usuariosId)) {
                ?>
                <div class="container col-10 semLogin">
                    <p>Para solicitar participação realize seu <a href="cadastro.php" class="noEvent">cadastro</a> ou <a href="login.php" class="noEvent">acesse sua conta</a>.</p>
                </div>
                <?php
            }
        } else if ($dataAtual >= $dataTermino) {
            //o usuário não pode mais solicitar participação
            echo '<br>Você não pode solicitar participação!';
            $sqlMedia = mysqli_query($conexao, "SELECT AVG(avaliacoes.nota) AS mediaEvento FROM avaliacoes INNER JOIN solicitacao ON avaliacoes.solicitacaoId = solicitacao.solicitacaoId WHERE solicitacao.eventosId = '$eventosId'");
            $media = mysqli_fetch_assoc($sqlMedia);
            $media["mediaEvento"] = number_format($media["mediaEvento"], 1);
            if ($media["mediaEvento"] > 0) {
                echo "<br>Média das notas do evento: " . $media["mediaEvento"];
            }
            if (isset($usuariosId)) {
                //verifica se o usuário está participando e se ainda não avaliou o evento
                $sqlParticipacao = mysqli_query($conexao, "SELECT * FROM solicitacao WHERE eventosId = '$eventosId' AND usuariosId='$usuariosId' AND aprovado='Sim'");
                $sqlComentarios = mysqli_query($conexao, "SELECT * FROM avaliacoes INNER JOIN solicitacao ON avaliacoes.solicitacaoId = solicitacao.solicitacaoId WHERE solicitacao.usuariosId = '$usuariosId' AND solicitacao.eventosId = '$eventosId' AND aprovado='Sim'");
                if (mysqli_num_rows($sqlParticipacao) === 1 && mysqli_num_rows($sqlComentarios) === 0) {
                    $solicitacaoId = mysqli_fetch_assoc($sqlParticipacao);
                    // form de avaliação
                ?>
                    <div class="container form-group">
                        <form action="../includes/eventComment.inc.php" method="post">
                            <input type="hidden" name="solicitacaoId" value="<?= $solicitacaoId["solicitacaoId"] ?>">
                            <input type="hidden" name="linkEvento" value="<?= $linkEvento ?>">
                            <label for="notaAvaliacao">Nota:</label><br>
                            <input class="form-avaliacao mb-1" type="number" name="nota" min="1" max="5" step="1" id="notaAvaliacao"><br>
                            <label for="comentario">Comentário:</label><br>
                            <textarea class="form-avaliacao" name="comentario" rows="4" cols="50"></textarea><br>
                            <div class="container col-4 col-md-6 col-lg-4">
                                <button type="submit" name="enviar" id="enviar" disabled class="botaoAvaliacao">Enviar</button>
                            </div>
                        </form>
                    </div>
                <?php
                }
            }
            //mostrando todos os comentários do evento passado
            $sqlMostraComentarios = mysqli_query($conexao, "SELECT usuarios.usuariosNome, avaliacoes.comentario, avaliacoes.nota FROM avaliacoes INNER JOIN solicitacao ON avaliacoes.solicitacaoId = solicitacao.solicitacaoId INNER JOIN usuarios ON solicitacao.usuariosId = usuarios.usuariosId WHERE eventosId = '$eventosId'");
            if (mysqli_num_rows($sqlMostraComentarios) > 0) {
                ?>
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-8 col-lg-6">
                            <div class="card shadow-0 border" style="background-color: #f0f2f5;">
                                <div class="card-body p-4 containerComentarios">
                                    <?php

                                    while ($comentarios = mysqli_fetch_assoc($sqlMostraComentarios)) {
                                        //html com os comentarios abaixo
                                    ?>

                                        <div class="card mb-0 mt-2">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <i class="fa-solid fa-user" style="color: #42c82c;"></i>
                                                        <p class="small mb-0 ms-2" style="font-weight: bold;"><?= $comentarios["usuariosNome"] ?></p>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <p class="small text-muted mb-0" style="font-weight: bold;">Nota:&nbsp;</p>
                                                        <p class="small text-muted mb-0" style="font-weight: bold;"><?= $comentarios["nota"] ?></p>
                                                        <i class="far fa-solid fa-star mx-2 fa-xs" style="color: #42c82c;"></i>
                                                    </div>
                                                </div>
                                                <p class="comentario mb-0"><?= $comentarios["comentario"] ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
            }
        }
        echo "<div class='empurrarFooter'></div>";
    } else {
        echo "Nenhum evento registrado com este link.";
    }
} else {
    header('Location: index.php');
}

include_once 'footer.php';
