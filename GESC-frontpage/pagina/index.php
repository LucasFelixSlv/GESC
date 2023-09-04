<?php
include_once 'header.php';
?>
<div class="carouselMargin">
    <div id="carouselExampleIndicators" class="carousel slide carouselContent" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="carouselIndicators active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="carouselIndicators" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="carouselIndicators" aria-label="Slide 3"></button>
        </div>
        <div class="carouselBorder carousel-inner">
            <div class="carousel-item active">
                <img src="https://placehold.co/1920x1080" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://placehold.co/1600x900" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="../assets/im002.jpg" class="d-block w-100" alt="...">
            </div>
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
<div class="container d-flex">
    <div class="p-relative formData">
        <h2 class="nextEvents">PRÓXIMOS EVENTOS</h2>
        <div>
            <form method="post" class="datePicker">
                <label for="dataSelecionada">Data: </label>
                <input type="date" id="dataSelecionada" name="dataSelecionada" class="dataInput">
                <button type="submit" class="dataButton">Pesquisar</button>
            </form>
        </div>
    </div>
    <div class="row g-3 mobileCenter">
        <!-- MODAL -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM MODAL -->
    </div>

    <?php
    include_once 'footer.php';
    ?>