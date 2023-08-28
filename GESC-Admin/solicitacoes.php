<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESC - Admin</title>
    <script src="script.js"></script>
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
                <img class="img-fluid" src="imagens/evento.jpg">
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

      
    










    <link rel="stylesheet" href="style.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>


</html>