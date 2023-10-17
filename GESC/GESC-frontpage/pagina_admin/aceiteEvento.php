<?php
session_start();

<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/aceiteEvento.php
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
=======
include '../includes/dbh.inc.php';
session_start();
if (isset($_SESSION["usuariosId"])) {

    if (isset($_POST['aceitar'])) {

        $nomeUsuario = $_POST['nomeUsuario'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $aprovado = $_POST['aprovado'];

        $sql = "INSERT INTO `aceiteEvento` (nomeUsuario, aprovado) VALUES ('$nomeUsuario', '$aprovado')";
        $rs = mysqli_query($conexao, $sql);
    }
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/aceiteEvento.php

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

<<<<<<< HEAD:GESC/GESC-frontpage/pagina_admin/aceiteEvento.php


        <button type="submit" name="aceitar" class="btn btn btn-success">Salvar Evento</button>
    </form>
</body>
=======
            <button type="submit" name="aceitar" class="btn btn btn-success">Salvar Evento</button>
        </form>
    </body>
>>>>>>> 1e7446fdaf20109a98474020cbadae1bfe0b3bc3:GESC-frontpage/pagina_admin/aceiteEvento.php

    </html>
<?php
} else {
    header('location: ../pagina_principal/index.php');
}
