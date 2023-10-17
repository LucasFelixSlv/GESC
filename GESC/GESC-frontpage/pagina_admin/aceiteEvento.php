<?php
session_start();

if (isset($_SESSION["usuariosId"])) {

    include '../includes/dbh.inc.php';

    if (isset($_POST['aceitar'])) {

        $nomeUsuario = $_POST['nomeUsuario'];
        $aprovado = $_POST['aprovado'];

        $sql = "INSERT INTO `aceiteEvento` (nomeUsuario, aprovado) VALUES ('$nomeUsuario', '$aprovado')";
        $rs = mysqli_query($conexao, $sql);
    }
} else {
    header("location: ../pagina_principal/index.php");
}

?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Formulário de Registro de Evento</title>
    </head>

    <body>
        <h1>Formulário de Registro de Evento</h1>
        <p>Preencha o formulário abaixo para se registrar para o evento:</p>

        <form action="aceiteEvento.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nomeUsuario" name="nomeUsuario" required><br><br>

            <input type="hidden" id="aprovado" name="aprovado" value="Não"><br><br>



        <button type="submit" name="aceitar" class="btn btn btn-success">Salvar Evento</button>
    </form>
</body>

    </html>
<?php
} else {
    header('location: ../pagina_principal/index.php');
}
