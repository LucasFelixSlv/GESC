<?php

session_start();
include_once('../includes/dbh.inc.php');

// Buscar dados do evento

$sql = "SELECT nomeUsuario, email, telefone, COUNT(aprovado) AS somaTotal FROM `aceiteEvento`;";
$result = $conexao->query($sql);
$dadosSolicitacao = $result->fetch_assoc();

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
  <div class="container">
    <div class="row">
      <h1 class="display-5 text-center">Aprovar Solicitações</h1>
    </div>
  </div>

  <div class="container">
    <form>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <img class="img-fluid" src="../assets/evento.jpg">
          </div>
        </div>
        <div class="col-md-6 mt-4">
          <div class="form-group">
            <div class="form-check">
              <h1 class="fs-6">5 pessoas querem participar</h1>
              <input type="checkbox" class="form-check-input" id="check">
              <label class="form-check-label" for="exampleCheck">Aceitar todos</label>
              <button type="submit" class="btn btn-primary btn-sm">Enviar</button>
            </div>
            <form>
              <label for="confirmSelect">Confirmar Manualmente:</label>
              <div class="multiselect">
                <div class="selectBox" onclick="showCheckboxes()">
                  <select>
                    <option>Solicitações</option>
                  </select>
                  <div class="overSelect"></div>
                </div>
                <div id="checkboxes">
                  <label for="one">
                    <input type="checkbox" id="one" />João</label>
                  <label for="two">
                    <input type="checkbox" id="two" />José</label>
                  <label for="three">
                    <input type="checkbox" id="three" />Maria</label>
                  <label for="four">
                    <input type="submit" class="btn btn-primary btn-sm"></label>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
  </form>
  </div>

  <!-- Conteúdo Principal -->
  <div class="m-4">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Evento</th>
          <th scope="col">Solicitações</th>
          <th scope="col">Nome</th>
          <th scope="col">Email</th>
          <th scope="col">Telefone</th>
          <th scope="col">Aprovar</th>
          <th scope="col">...</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $result->data_seek(0);

        while ($dadosSolicitacao = mysqli_fetch_assoc($result)) {


          // echo "<td>" . $dadosSolicitacao["nome"] . "</td>";
          echo "<td>" . $dadosSolicitacao["somaTotal"] . "</td>";
          echo "<td>" . $dadosSolicitacao["nomeUsuario"] . "</td>";
          echo "<td>" . $dadosSolicitacao["email"] . "</td>";
          echo "<td>" . $dadosSolicitacao["telefone"] . "</td>";
          /* echo "<td>
                                    <a class='btn btn-sm btn-primary' href='editar.php?idEvento=$dadosSolicitacao[idEvento]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                  </svg>
                                  </a>
                                  <a class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop'  href='deletar.php?idEvento=$dadosSolicitacao[idEvento]'>
                                  <input type='hidden' name='idDoRegistro' value='<?php echo $dadosSolicitacao; ?>'>
                                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                                    <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
                                  </svg>
                                </td>"; */
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <link rel="stylesheet" href="styleAdmin.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>


</html>