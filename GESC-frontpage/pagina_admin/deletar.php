<?php
require("../includes/dbh.inc.php");
session_start();
if (isset($_SESSION["usuariosId"])) {

    if ($_POST['EventoIdDeletar']) {

        $id = $_POST['EventoIdDeletar'];

        $sql = "DELETE FROM eventos WHERE eventosId = $id";

        if (mysqli_query($conexao, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
        } else {
            echo ('erro ao excluir');
        }
        header('Location: escolherEditar.php');

        mysqli_close($conexao);
    }
} else {
    header('location: ../pagina_principal/index.php');
}
