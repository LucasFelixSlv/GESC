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

        $dataAtualFormat = date_format($dataAtual,"d/m/Y");
        $dataTerminoFormat = date_format($dataTermino,"d/m/Y");
        $dataInicio = new DateTime($aux["dataInicio"]);
        $dataInicio = date_format($dataInicio, "d/m/Y");

        //
        //Aqui fica os detalhes do evento
        //

        ?>
        <div>
             <img src="<?= $aux["imagem"] ?>" alt="<?= $aux["nome"] ?>" />
        </div>
            <h3><?=$aux["nome"] ?></h3>
            <P ><?=$aux["descricao"] ?></p>
            <p><?=$dataInicio ?><span style="color: white;"> - </span><?= $dataTerminoFormat ?></p>
        

<?php


        //aqui os detalhes do evento

        $sqlSolicitacao = mysqli_query($conexao, "SELECT usuariosId FROM solicitacao WHERE eventosId = '$eventosId'");

        if ($dataAtual < $dataTermino) {
            //o usuário ainda pode solicitar participação
            echo '<br>Você pode solicitar participação!';
            if (isset($usuariosId)) {
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
            }
        } else if ($dataAtual >= $dataTermino) {
            //o usuário não pode mais solicitar participação
            echo '<br>Você não pode solicitar participação!';
            if (isset($usuariosId)) {
                $sqlAceito = mysqli_query($conexao, "SELECT * FROM solicitacao WHERE usuariosId = '$usuariosId' AND eventosId = '$eventosId' AND aprovado = 'SIM'");
                if (mysqli_num_rows($sqlAceito) === 1) { //se a solicitação foi aceita, colocá-lo na tabela participacao_eventos e retirar da solicitacao
                    //essa parte será colocada na parte de admin
                    //para aceitar a solicitação precisa ir no banco de dados e na coluna "aprovado" da tabela "solicitacao" e digitar SIM;
                    mysqli_query($conexao, "INSERT INTO participacao_eventos (usuariosId, eventosId) VALUES ('$usuariosId', '$eventosId')");
                    mysqli_query($conexao, "DELETE FROM solicitacao WHERE usuariosId = '$usuariosId' AND eventosId = '$eventosId'");
                }
                //verifica se o usuário está participando e se ainda não avaliou o evento
                $sqlParticipacao = mysqli_query($conexao, "SELECT * FROM participacao_eventos WHERE eventosId = '$eventosId' AND usuariosId='$usuariosId'");
                $sqlComentarios = mysqli_query($conexao, "SELECT * FROM avaliacoes INNER JOIN participacao_eventos ON avaliacoes.participacaoId = participacao_eventos.participacaoId WHERE participacao_eventos.usuariosId = '$usuariosId' AND participacao_eventos.eventosId = '$eventosId'");
                if (mysqli_num_rows($sqlParticipacao) === 1 && mysqli_num_rows($sqlComentarios) === 0) {
                    $participacaoId = mysqli_fetch_assoc($sqlParticipacao);
                    //form de avaliação
                ?>
                    <form action="../includes/eventComment.inc.php" method="post">
                        <input type="hidden" name="participacaoId" value="<?= $participacaoId["participacaoId"] ?>">
                        <input type="hidden" name="linkEvento" value="<?= $linkEvento ?>">
                        <input type="number" name="nota" min="1" max="5" step="1" id="notaAvaliacao" onchange="checkNota()">
                        <textarea name="comentario" rows="4" cols="50"></textarea>
                        <button type="submit" name="enviar" id="enviar" disabled>Enviar</button>
                    </form>
            <?php
                }
            }
            //mostrando todos os comentários do evento passado
            $sqlMostraComentarios = mysqli_query($conexao, "SELECT usuarios.usuariosNome, avaliacoes.comentario, avaliacoes.nota FROM avaliacoes INNER JOIN participacao_eventos ON avaliacoes.participacaoId = participacao_eventos.participacaoId INNER JOIN usuarios ON participacao_eventos.usuariosId = usuarios.usuariosId WHERE eventosId = '$eventosId'");
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
    } else {
        echo "Nenhum evento registrado com este link.";
    }
} else {
    header('Location: index.php');
}

include_once 'footer.php';
