<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('../includes/dbh.inc.php');
    $sql = null;
    if (isset($_POST["pesquisarEvento"])) {
        $pesquisarEvento = mysqli_real_escape_string($conexao, $_POST["pesquisarEvento"]);
        $sql = mysqli_query($conexao, "SELECT * FROM eventos WHERE nome LIKE '%$pesquisarEvento%' OR localEv LIKE '%$pesquisarEvento%' ORDER BY dataInicio ASC");
    } else if (isset($_POST["dataSelecionada"])) {
        $pesquisarData = mysqli_real_escape_string($conexao, $_POST["dataSelecionada"]);
        $sql = mysqli_query($conexao, "SELECT * FROM eventos WHERE '$pesquisarData' BETWEEN dataInicio AND dataTermino ORDER BY dataInicio ASC");
    }
    $queryResult = mysqli_num_rows($sql);
    include_once 'header.php';
    if ($queryResult > 0) {
?>
        <div class="container divEvents">
            <?php
            if (isset($pesquisarEvento)) {
            ?>
                <p class="textoPesquisa">Exibindo resultados para: "<?= $pesquisarEvento ?>"</p>
            <?php
            } else {
                $dataEnviada = new DateTime($pesquisarData);
            ?>
                <p class="textoPesquisa">Exibindo eventos do dia <?= date_format($dataEnviada, "d/m") ?> </p>
            <?php
            }
            ?>

            <div class="row g-3 mobileCenter">

                <?php
                date_default_timezone_set('America/Sao_Paulo');
                $dataAtual = date('d/m/Y');
                while ($aux = mysqli_fetch_assoc($sql)) {
                    $dataInicio = $aux["dataInicio"];
                    $DataEspecificaInicio = new DateTime($dataInicio);
                    $dataTermino = $aux["dataTermino"];
                    $DataEspecificaTermino = new DateTime($dataTermino);
                ?>
                    <div class="col-10 col-md-6 col-lg-4 containerModal">
                        <div class="roundCard card h-100">
                            <img class="imageFit card-img-top" src="<?= $aux["imagem"] ?>" alt="imagem 3" />
                            <div class="infoCard card-body">
                                <p class="m-0 dataEvento"><?= date_format($DataEspecificaInicio, "d/m/Y") ?><span style="color: white;"> - </span><?= date_format($DataEspecificaTermino, "d/m/Y") ?></p>
                                <div class="textCard">
                                    <?php
                                    if ($dataAtual > date_format($DataEspecificaTermino, "d/m/Y")) {
                                    ?>
                                        <p class="eventoFinalizado">[Finalizado]</p>
                                    <?php
                                    }
                                    ?>
                                    <h3 class="card-title"><?= $aux["nome"] ?></h3>
                                </div>
                                <a href="evento.php?id=<?= $aux["link"] ?>" class="modalButton" name="BotaoEvento">Mais detalhes</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
<?php
    } else {
        echo "<p class='textoPesquisa'>Nenhum resultado.</p>";
    }
} else {
    header("Location: index.php");
    die();
}

?>


<?php
include_once 'footer.php';
?>