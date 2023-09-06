<?php
    session_start();
    include_once('connect.php');

    $idEvento = $_POST["idEvento"];

    // Executar a exclusão
    $sql = "DELETE FROM tabela WHERE id = $idEvento";


?>


<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESC - Admin</title>
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
  </head>

<body>
    
    <h2>Detalhes do Evento</h2>

    <h1>Olá</h1>
    <form>
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $dadosEvento['nome']; ?>"><br>
        
        <label>Descrição:</label>
        <textarea type="text" name="descricao" value="<?php echo $dadosEvento['descricao']; ?>"></textarea><br>
        
        <label>Local:</label>
        <input type="text" name="local" value="<?php echo $dadosEvento['localEv']; ?>"><br>
    </form>

    <div>
    <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $dadosEvento['imagem']; ?>"><br>
    </div>

    <div class="container">
        <div class="mb-3">
            <label for="imageInput" class="form-label">Alterar imagem do Evento:</label>
            <input type="file" class="form-control-file" id="imageInput" name="imagem" value="<?php echo $dadosEvento['imagem']; ?>">
        </div>
    </div>

    <div class="container">
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" class="form-control" id="data" name="dataEv"
                value="<?php echo $dadosEvento['dataEv']; ?>">
        </div>
    </div>

    <form method="post" action="#">
        <label>ID do Registro a Excluir:</label>
        <input type="number" name="idevento" required>
        <input type="submit" value="Excluir">
    </form>

    
</body>
</html>
