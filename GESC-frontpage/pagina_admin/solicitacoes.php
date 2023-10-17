<?php

session_start();
if (isset($_SESSION["usuariosId"])){
$usuariosId = $_SESSION['usuariosId'];
include_once('../includes/dbh.inc.php');

// Buscar dados do evento

$sql = "SELECT 
          solicitacao.solicitacaoId,
          usuarios.usuariosNome,
          solicitacao.aprovado,
          eventos.nome 
        FROM usuarios
        INNER JOIN solicitacao
        ON usuarios.usuariosId = solicitacao.usuariosId
        INNER JOIN eventos
        ON solicitacao.eventosId = eventos.eventosId
        WHERE solicitacao.aprovado = 'Não' AND eventos.usuariosId ='$usuariosId';";

$result = $conexao->query($sql);
$dadosSolicitacao = $result->fetch_assoc();

$sqlCount = "SELECT
            COUNT(aprovado) AS cont_aprovados
            FROM solicitacao
            INNER JOIN eventos
            ON solicitacao.eventosId = eventos.eventosId
            WHERE aprovado = 'Sim' AND eventos.usuariosId ='$usuariosId';";

$resultCount = $conexao->query($sqlCount);
$dadosCount = $resultCount->fetch_assoc();
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GESC - Admin</title>
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/icon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/icon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/icon/favicon-16x16.png">
  <link rel="manifest" href="../assets/icon/site.webmanifest">
  <script src="scriptAdmin.js"></script>
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
            <a class="nav-link" href="escolherEditar.php">Editar Evento</a>
          </li>
          <li class="nav-item ps-5">
            <a class="nav-link" href="avaliacoes.php">Ver Avaliações</a>
          </li>
          <li class="nav-item ps-5">
            <a class="nav-link" href="solicitacoes.php">Aprovar Solicitações</a>
          </li>
          <li class="nav-item ps-5">
            <a class="nav-link" href="../pagina_principal/index.php">Início</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Conteúdo Principal -->

  <form action="salvarSolicitacao.php" method="POST">
    <div class="m-4" id="dado">
      <p class="h5">Usuários aprovados até o momento: <?= $dadosCount['cont_aprovados'] ?></p>
      <table class="table">
        <thead>
          <tr>
            <th class="col-md-4">Nome</th>
            <th class="col-md-4">Nome do Evento</th>
            <th class="col-md-4">Aprovar Individualmente</th>
            <th scope="col">
              <div class="container">
                <button type="submit" name="usuariosId" class="btn btn-success" 
                value="<?= $usuariosId ?>">Aprovar todos</button>
            </th>
          </tr>
        </thead>
        <tbody>

        <form action="salvarSolicitacao.php">

          <?php
          $result->data_seek(0);

          while ($dadosSolicitacao = mysqli_fetch_assoc($result)) {

          ?>
            <tr>
              <td><?= $dadosSolicitacao['usuariosNome'] ?></td>
              <td><?= $dadosSolicitacao['nome'] ?></td>
              
                <td>
                  <button type="submit" name="solicitacaoId" class="btn btn-success" 
                  value="<?= $dadosSolicitacao['solicitacaoId'] ?>">Aprovar</button>
                </td>
              
              <td></td>
              <td></td>
            </tr>
          <?php
          }
          ?>
        </form>
        </tbody>
      </table>
    </div>
  </form>

  <?php

  if ($result->num_rows === 0) {
    // Se o valor for igual a "Sim", exiba uma mensagem Bootstrap
    echo '<div class="alert alert-success" role="alert">
                    Nenhuma aprovação pendente.
                  </div>';
  }
  ?>
  
  <link rel="stylesheet" href="styleAdmin.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>


</html>
<?php
}else{
  header('location: ../pagina_principal/index.php');
}