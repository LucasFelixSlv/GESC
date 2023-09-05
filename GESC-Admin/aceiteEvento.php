<?php 

include 'connect.php';

    if(isset($_POST['aceitar'])){

        $nomeUsuario = $_POST['nomeUsuario'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $aprovado = $_POST['aprovado'];

        $sql = "INSERT INTO `aceiteEvento` (nomeUsuario, email, telefone, aprovado) VALUES ('$nomeUsuario',  '$email', '$telefone', '$aprovado')";
        $rs = mysqli_query($conexao, $sql);

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
        
        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br><br>
        
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone"><br><br>

        <input type="hidden" id="aprovado" name="aprovado" value="Não"><br><br>


        
        <button type="submit" name="aceitar" class="btn btn btn-success">Salvar Evento</button>
    </form>
</body>
</html>