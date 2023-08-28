<?php
    session_start();
    include_once('connect.php');

    // Buscar dados do evento

    if(isset($_POST['update'])){

        $idEvento = $_POST['idEvento'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $localEv = $_POST['localEv'];
        $dataEv = $_POST['dataEv'];
        $inicio = $_POST['inicio'];
        $termino = $_POST['termino'];
        $imagem = $_POST['imagem'];

        $sqlUpdate = "UPDATE eventos SET nome='$nome', descricao='$descricao', localEv='$localEv', 
                        dataEv='$dataEv', inicio='$inicio', termino='$termino', imagem='$imagem' WHERE idEvento='$idEvento'";

        $result = $conexao->query($sqlUpdate);

    }

    if($result->num_rows > 0){

        while($dadosEvento = mysqli_fetch_assoc($result))
        $idEvento = $_dadosEvento['idEvento'];
        $nome = $_dadosEvento['nome'];
        $descricao = $dadosEvento['descricao'];
        $localEv = $dadosEvento['localEv'];
        $dataEv = $dadosEvento['dataEv'];
        $inicio = $dadosEvento['inicio'];
        $termino = $dadosEvento['termino'];
        $imagem = $dadosEvento['imagem'];

    }

    print_r($nome);

    $idEvento=$_POST['idEvento'];

    $query = "DELETE FROM eventos WHERE idEvento='$idEvento'";

    $resultado = mysqli_query($conexao, $query);

    if(!empty($_GET['idEvento']))

    $idEvento = $_GET['idEvento'];

    $sql = "SELECT idEvento, nome, descricao, localEv, dataEv, inicio, termino, imagem FROM `eventos` WHERE idEvento='$idEvento'";
    $result = $conexao->query($sql);

    
    $dadosEvento = $result->fetch_assoc();

?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GESC - Admin</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
                        <a class="nav-link" href="adicionar.php">Adicionar novo Evento</a>
                    </li>
                    <li class="nav-item ps-5">
                        <a class="nav-link" href="editar.php">Editar Evento</a>
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

    <form action="#" method="POST">

    <div class="container">
        <div class="row">
            <h1 class="display-5 text-center">Editar Evento</h1>
        </div>
    </div>

    <div class="container">
        <div class="mb-3">
            <label for="nome" class="form-label">Evento:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dadosEvento['nome'] ?>">
                
        </div>
    </div>


    <div class="container">
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="2"><?php echo $dadosEvento['descricao']; ?></textarea>
        </div>
    </div>


    <div class="container">
        <div class="mb-3">
            <label for="local" class="form-label">Local:</label>
            <input type="text" class="form-control" id="localEv" name="localEv" value="<?php echo $dadosEvento['localEv']; ?>">
                
        </div>
    </div>

    <div class="container">
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" class="form-control" id="data" name="dataEv" value="<?php echo $dadosEvento['dataEv']; ?>">
        </div>
    </div>

    <div class="container">
        <div class="mb-3">
            <label for="horario-inicio" class="form-label">Início do Evento:</label>
            <input type="time" class="form-control" id="horario-inicio" name="inicio" value="<?php echo $dadosEvento['inicio']; ?>">
        </div>
    </div>

    <div class="container">
        <div class="mb-3">
            <label for="horario-termino" class="form-label">Término do Evento:</label>
            <input type="time" class="form-control" id="horario-termino" name="termino" value="<?php echo $dadosEvento['termino']; ?>">
        </div>
    </div>

    <input type="hidden" name="idEvento" value="<?php echo $dadosEvento['idEvento']; ?>">

    <div class="container">
        <div class="mb-3">
            <label for="imageInput" class="form-label">Alterar imagem do Evento:</label>
            <input type="file" class="form-control-file" id="imageInput" name="imagem" value="<?php echo $dadosEvento['imagem']; ?>">
        </div>
    </div>

    <div class="container">
            <div class="col text-left">
                <input type="hidden" name="idEvento" value="<?php echo $dadosEvento['idEvento']; ?>">
                <button type="submit" name="delete" id="delete"  class="btn btn-danger mb-3">Excluir Evento</button>
            </div>
            <div class="col text-end">
                <input type="hidden" name="idEvento" value="<?php echo $dadosEvento['idEvento']; ?>">
                <button type="submit" name="update" id="update" class="btn btn-success mb-4">Salvar Alterações</button>
            </div>
    </div>

    </form>

    <?php
    $conexao->close();
    ?>

    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>