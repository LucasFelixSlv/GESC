<?php
include_once 'header.php';

if (isset($_GET['id'])) {
    include_once '../includes/dbh.inc.php';
    $linkEvento = $_GET['id'];
    $usuariosId = $_SESSION["usuariosId"];
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

        $sqlSolicitacao = mysqli_query($conexao, "SELECT usuariosId FROM participacao_eventos WHERE eventosId = '$eventosId'");

        if ($dataAtual < $dataTermino) {
            //o usuário ainda pode solicitar participação
            echo '<br>Você pode solicitar participação!';
            if (isset($usuariosId)) {
                if (mysqli_num_rows($sqlSolicitacao) > 0) {
                    echo '<p>Solicitação enviada!</p>';
                } else {
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
                $sqlComentarios = mysqli_query($conexao, "SELECT participacao_eventos.usuariosId FROM participacao_eventos INNER JOIN avaliacoes ON participacao_eventos.participacaoId = avaliacoes.participacaoId");
                if (mysqli_num_rows($sqlSolicitacao) === 1 && mysqli_num_rows($sqlComentarios) === 0) {
                    $sqlParticipacao = mysqli_query($conexao, "SELECT participacaoId FROM participacao_eventos WHERE usuariosId = '$usuariosId'");
                    $participacaoId = mysqli_fetch_assoc($sqlParticipacao);
                ?>
                    <form action="../includes/eventComment.inc.php" method="post">
                        <input type="hidden" name="participacaoId" value="<?= $participacaoId["participacaoId"] ?>">
                        <input type="hidden" name="linkEvento" value="<?= $linkEvento ?>">
                        <textarea name="comentario" rows="4" cols="50"></textarea>
                        <button type="submit" name="enviar">Enviar</button>
                    </form>
<?php
                } else {
                    $sqlMostraComentarios = mysqli_query($conexao, "SELECT * FROM avaliacoes");
                    while($comentarios = mysqli_fetch_assoc($sqlMostraComentarios)){
                        ?>
                        <p><?=$comentarios["comentario"]?></p>
                        <?php
                    }
                    
                }
            }
        }
    } else {
        echo "Nenhum evento registrado com este link.";
    }
} else {
    header('Location: index.php');
}

include_once 'footer.php';
