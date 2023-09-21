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
        $dataAtual = date('d/m/Y');

        $dataTermino = new DateTime($aux["dataTermino"]);
        $dataTermino = date_format($dataTermino, "d/m/Y");

        //
        //Aqui fica os detalhes do evento
        //

?>


        <div class="pagina">
            <div class="container">
                <div>
                    <img class="imageEvent" src="<?= $aux["imagem"] ?>" alt="<?= $aux["nome"] ?>" />
                </div>

                <div class="card text-center">
                    <div class="card-header">
                        <h5 class="card-title">Nome do evento</h5>
                    </div>
                    <div class="card-body">

                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet adipisci repellat
                            quis, a fugit aut. Saepe minima eius ab repellendus facere modi quisquam, sed officia laborum
                            similique id ipsa vitae.</p>

                    </div>
                    <div class="card-footer text-body-secondary">
                        <P> <?= $aux["dataInicio"] ?> <span style="color:black;"> - </span> <?= $aux["dataTermino"] ?></p>
                    </div>
                    <div class="card-footer text-body-secondary">
                        <?= $aux["localEv"] ?>
                    </div>

                </div>

            </div>
        

        <?php

        $sqlSolicitacao = mysqli_query($conexao, "SELECT usuariosId FROM solicitacao WHERE eventosId = '$eventosId'");

        if ($dataAtual < $dataTermino) { //o usuário ainda pode solicitar participação
            echo '<br>Você pode solicitar participação!';
            if (isset($usuariosId)) {
                if (mysqli_num_rows($sqlSolicitacao) > 0) {
                    echo '<p>Solicitação enviada!</p>'; //mensagem dizendo que a solicitação ja foi enviada
                } else { //se a solicitação ainda nao foi enviada, será mostrado um botão para solicitar
        ?>
                    <div class="container text-center">
                        <form action="../includes/eventParticipation.inc.php" method="post">
                            <input type="hidden" name="usuariosId" value="<?= $usuariosId ?>">
                            <input type="hidden" name="eventosId" value="<?= $aux["eventosId"] ?>">
                            <input type="hidden" name="linkEvento" value="<?= $linkEvento ?>">
                            <button class="modalButton w-60 mt-4" type="submit" name="participar">Solicitar participação</button>

                        </form>
                    </div>

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
                        <input type="number" name="nota" min="1" max="5" step="0.5" value="0">
                        <textarea name="comentario" rows="4" cols="50"></textarea>
                        <button type="submit" name="enviar">Enviar</button>
                    </form>
            <?php
                }
            }
        }
        //mostrando todos os comentários do evento passado
        $sqlMostraComentarios = mysqli_query($conexao, "SELECT usuarios.usuariosNome, avaliacoes.comentario, avaliacoes.nota FROM avaliacoes INNER JOIN participacao_eventos ON avaliacoes.participacaoId = participacao_eventos.participacaoId INNER JOIN usuarios ON participacao_eventos.usuariosId = usuarios.usuariosId WHERE eventosId = '$eventosId'");
        while ($comentarios = mysqli_fetch_assoc($sqlMostraComentarios)) {
            //html com os comentarios abaixo
            ?>
            <p>Usuário: <?= $comentarios["usuariosNome"] ?></p>
            <p>Nota: <?= $comentarios["nota"] ?></p>
            <p>Comentário: <?= $comentarios["comentario"] ?></p>
<?php
        }
?>
        </div>
<?php

    } else {
        echo "Nenhum evento registrado com este link.";
    }

} else {
    header('Location: index.php');
}

include_once 'footer.php';
