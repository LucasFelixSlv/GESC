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

        if($dataAtual < $dataTermino){
            //o usuário ainda pode solicitar participação
            echo '<br>Você pode solicitar participação!';

            ?>
            <div >
                <h1>Formulário de Registro de Evento</h1>
                <p>Preencha o formulário abaixo para se registrar para o evento:</p>
                
                <form id="formSolicitacao" action="aceiteEvento.php" method="POST">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="row">
                                <div class="col-md-7">
                                    <label class="form-label" for="nome">Nome:</label>
                                    <input type="text" class="form-control"  id="nomeUsuario" name="nomeUsuario" required><br><br>
                                </div>

                                <div class="col-md-7">
                                    <label class="form-label" for="email">Email:</label>
                                    <input type="text"  class="form-control"  id="email" name="email"><br><br>
                                </div>
                                
                                <div class="col-md-7">
                                    <label class="form-label" for="telefone">Telefone:</label>
                                    <input type="text" class="form-control"  id="telefone" name="telefone"><br><br>
                                </div>
                        </div>
                    </div>
                        <input type="hidden" class="form-control"  id="aprovado" name="aprovado" value="Não"><br><br>

                    <button type="submit" name="aceitar" class="btn btn btn-success ">Salvar Evento</button>
                </form>
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