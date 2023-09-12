<?php
include_once 'header.php';
require '../includes/dbh.inc.php';
$contentCheck = mysqli_query($conexao,"SELECT * FROM eventos LIMIT 1;") or die(mysqli_error($conexao));
$queryResult = mysqli_num_rows($contentCheck);
if($queryResult > 0){
?>
<div class="carouselMargin">
    <div id="carouselExampleIndicators" class="carousel slide carouselContent" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="carouselIndicators active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="carouselIndicators" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="carouselIndicators" aria-label="Slide 3"></button>
        </div>
        <div class="carouselBorder carousel-inner">
            <?php 
            // require '../includes/dbh.inc.php';
            $sql = mysqli_query($conexao, "SELECT * FROM eventos ORDER BY dataEv ASC LIMIT 3;") or die(mysqli_error($conexao));
            while ($aux = mysqli_fetch_assoc($sql)) {

            ?>
            <div class="carousel-item active">
                <form action="evento.php" method="post">
                    <input type="hidden" name="Titulo" value="<?= $aux["nome"] ?>" />
                    <input type="image" src="https://placehold.co/1920x1080" class="d-block w-100" alt="..."/>
                </form>
            </div>
            <?php } ?>
            <!-- <div class="carousel-item">
                <img src="https://placehold.co/1600x900" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/im002.jpg" class="d-block w-100" alt="...">
            </div> -->
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
                    <img class="imageFit card-img-top" src="../assets/im003.jpg" alt="imagem 3" />
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
<?php }else{
    echo "
    <div class='containerSemEvento'>
    <p class='semEvento'>Nenhum evento registrado!</p>
    </div>
    ";
} ?>
<?php
include_once 'footer.php';
?>