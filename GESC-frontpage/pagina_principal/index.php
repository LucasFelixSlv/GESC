<?php
include_once 'header.php';
require '../includes/dbh.inc.php';
$contentCheck = mysqli_query($conexao, "SELECT * FROM eventos LIMIT 1;") or die(mysqli_error($conexao));
$queryResult = mysqli_num_rows($contentCheck);
if ($queryResult > 0) {
?>
    <div class="carouselMargin">
        <div id="carouselExampleIndicators" class="carousel slide carouselContent" data-bs-ride="carousel">
            <?php
            $sql = mysqli_query($conexao, "SELECT * FROM eventos ORDER BY dataEv ASC LIMIT 4;") or die(mysqli_error($conexao));
            ?>
            <div class="carousel-indicators">
                <?php
                $slideNum = 0;
                while ($aux = mysqli_fetch_assoc($sql)) {
                    if ($slideNum === 0) {
                ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $slideNum ?>" class="carouselIndicators active" aria-current="true" aria-label="Slide <?= $slideNum + 1 ?>"></button>
                    <?php
                    } else {
                    ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $slideNum ?>" class="carouselIndicators" aria-label="Slide <?= $slideNum + 1 ?>"></button>
                <?php
                    }
                    $slideNum++;
                }
                ?>
            </div>
            <div class="carouselBorder carousel-inner">
                <?php
                $sql = mysqli_query($conexao, "SELECT * FROM eventos ORDER BY dataEv ASC LIMIT 4;") or die(mysqli_error($conexao));
                $carouselNum = 0;
                while ($aux = mysqli_fetch_assoc($sql)) {
                    if ($carouselNum === 0) {
                ?>
                        <div class="carousel-item active">
                        <?php
                    } else {
                        ?>
                            <div class="carousel-item">
                            <?php
                        }
                            ?>
                            <a href="evento.php?id=<?= $aux["link"] ?>">
                                <img class="d-block w-100" src="<?= $aux["imagem"] ?>" alt="<?= $aux["nome"] ?>">
                            </a>
                            </div>
                            <?= $carouselNum++; ?>
                        <?php }
                        ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carouselArrowPrev carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carouselArrowNext carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
            </div>
        </div>
        <div class="barDiv"></div>
        <div class="container divEvents">
            <div class="p-relative">
                <h2 class="nextEvents">PRÓXIMOS EVENTOS</h2>
                <div class="divDateSelect">
                    <form action="search.php" method="post" class="dateStyle">
                        <label for="dataSelecionada">Data: </label>
                        <input type="date" id="dataSelecionada" name="dataSelecionada" class="dataInput" required>
                        <button type="submit" class="dataButton">Pesquisar</button>
                    </form>
                </div>
            </div>
            <div class="row g-3 mobileCenter">
                <?php
                require '../includes/dbh.inc.php';
                $sql = mysqli_query($conexao, "SELECT * FROM eventos ORDER BY dataEv ASC") or die(mysqli_error($conexao));


                while ($aux = mysqli_fetch_assoc($sql)) {
                    $data = $aux["dataEv"];
                    $DataEspecifica = new DateTime($data);
                ?>
                    <div class="col-10 col-md-6 col-lg-4 containerModal"> <!-- card de evento começa aqui !-->
                        <div class="roundCard card h-100">
                            <img class="imageFit card-img-top" src="<?= $aux["imagem"] ?>" alt="<?= $aux["nome"] ?>" />
                            <div class="infoCard card-body">
                                <p class="m-0"><?= date_format($DataEspecifica, "d/m") ?></p>
                                <div class="textCard">
                                    <h3 class="card-title"><?= $aux["nome"] ?></h3>
                                </div>
                                <form action="evento.php" method="post">
                                    <input type="hidden" name="Titulo" value="<?= $aux["nome"] ?>" />
                                    <button type="submit" class="modalButton" name="BotaoEvento">Mais detalhes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } else {
    echo "
    <div class='containerSemEvento'>
    <p class='semEvento'>Nenhum evento registrado!</p>
    </div>
    ";
} ?>
    <?php
    include_once 'footer.php';
    ?>