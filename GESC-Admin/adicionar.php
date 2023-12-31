<?php

include_once ('connect.php');

    if(isset($_POST['submit'])){

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $localEv = $_POST['localEv'];
        $dataEv = $_POST['dataEv'];
        $inicio = $_POST['inicio'];
        $termino = $_POST['termino'];
        $imagem = $_POST['imagem'];

        $sql = "INSERT INTO `eventos` (nome, descricao, localEv, dataEv, inicio, termino, imagem) VALUES ('$nome', '$descricao', '$localEv', '$dataEv', '$inicio', '$termino', '$imagem')";
    $rs = mysqli_query($conexao, $sql);

    }
?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESC - Admin</title>
    <script src="modal.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


  </head>

  <body>
    
    <header class="bg-black text-white text-center">
        <div class="container">
            <div class="row"> 
                <div class="col-md-12">
                    <h1>Administração</h1>
                </div>
            </div>
        </div>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="">Adicionar novo Evento</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="escolherEditar.php">Editar Evento</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="avaliacoes.php">Ver Avaliações</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="solicitacoes.php">Aprovar Solicitações</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
            
    <!-- Conteúdo Principal -->

    <div id="message" style="display: none;">
    Evento com sucesso!
    </div>

    <form id="myform" action="adicionar.php" role="form" method="POST">
        
        <div class="container">
            <h1 class="display-5 text-center">Novo Evento</h1>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="nome" class="form-label">Evento:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do seu Evento">
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="2" placeholder="Digite a descrição do Evento"></textarea>
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="local" class="form-label">Local:</label>
                <input type="text" class="form-control" id="local" name="localEv" placeholder="Digite o local do Evento">
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="data" class="form-label">Data:</label>
                <input type="date" class="form-control" id="data" name="dataEv">
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="horario-inicio" class="form-label">Início do Evento:</label>
                <input type="time" class="form-control" id="horario-inicio" name="inicio">
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="horario-termino" class="form-label">Término do Evento:</label>
                <input type="time" class="form-control" id="horario-termino" name="termino">
            </div>
        </div>

        <div class="container">
            <div class="mb-3">
                <label for="imageInput" class="form-label">Inserir imagem do Evento:</label>
                <input type="file" class="form-control-file" id="imageInput" name="imagem">
            </div>
        </div>

        <div class="container">
            <div class="text-end">
                <button type="button" name="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-success mb-4">Salvar</button>
            </div>
        </div>
   

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Deseja salvar?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" name="submit" class="btn btn btn-success">Salvar Evento</button>
            </div>
            </div>
        </div>
        </div>
    </form>

    <link rel="stylesheet" href="style.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>

</html>

