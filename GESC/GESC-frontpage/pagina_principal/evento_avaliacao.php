<?php
include_once 'header.php';

if (isset($_GET['id'])){
    include_once '../includes/dbh.inc.php';
    $linkEvento = $_GET['id'];
    $linkEvento = mysqli_real_escape_string($conexao, $linkEvento);
    $result = mysqli_query($conexao, "SELECT * FROM eventos WHERE link = '$linkEvento'");

    if(mysqli_num_rows($result) > 0){
        $sql = mysqli_query($conexao, "SELECT * FROM eventos WHERE link = '$linkEvento'");
        $aux = mysqli_fetch_assoc($sql);

        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = date('d/m/Y');

        $dataTermino = new DateTime($aux["dataTermino"]);
        $dataTermino = date_format($dataTermino, "d/m/Y");


        ?>



<?php
    
        if($dataAtual < $dataTermino){
            //o usuário ainda pode solicitar participação
            echo '<br></br>';

        

           



            ?>
<div class="container">
    <div>
        <img class="imageEvent" src="<?= $aux["imagem"] ?>" alt="<?= $aux["nome"] ?>" />
    </div>

    <div class="content">
        <div class="d-flex flex-column justify-content-center">
            <div class="row col-md-12">
                <div class="estrelas">
                    <input type="radio" id="cm_star-empty" name="fb" value="" checked />
                    <label for="cm_star-1"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-1" name="fb" value="1" />
                    <label for="cm_star-2"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-2" name="fb" value="2" />
                    <label for="cm_star-3"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-3" name="fb" value="3" />
                    <label for="cm_star-4"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-4" name="fb" value="4" />
                    <label for="cm_star-5"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-5" name="fb" value="5" />
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Qual sua opinião sobre o evento?</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <input type="hidden" class="form-control" id="aprovado" name="aprovado" value="Não"><br><br>
            <button type="submit" name="aceitar" class="btn btn btn-success ">Salvar Evento</button>
        </div>
    </div>

    <?php 
        }
       
        }else if($dataAtual >= $dataTermino){
            //o usuário não pode mais solicitar participação
            echo '<br>Você não pode solicitar participação!';
           

    } else{
        echo "Nenhum evento registrado com este link.";
    }

} else {
    header('Location: index.php');
}

include_once 'footer.php';
?>