<?php

include '../includes/dbh.inc.php';
session_start();
if (isset($_SESSION["usuariosId"])) {

    if (isset($_POST['adicionarComentario'])) {

        $participacaoId = $_POST['participacaoId'];
        $comentario = $_POST['comentario'];
    }

    $sql = "INSERT INTO `avaliacoes` (participacaoId, comentario) VALUES ('$participacaoId', '$comentario')";

    $rs = mysqli_query($conexao, $sql);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário de Comentário</title>
    </head>

    <body>
        <h1>Deixe seu Comentário</h1>
        <form action="tt.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nomeUsuario" name="nomeUsuario" required><br><br>

            <label for="comentario">Comentário:</label>
            <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>

            <input type="submit" name="adicionarComentario" value="Enviar Comentário">
        </form>
    </body>

    </html>
<?php
} else {
    header('location: ../pagina_principal/index.php');
}
