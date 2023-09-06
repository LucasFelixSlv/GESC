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


    <!-- Menu Lateral -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
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

    <div class="container">
        <h1 class="display-5 text-center">Minhas Avaliações</h1>
    </div>

    <div class="container">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Avaliação do seu Evento</h5>
            
            <div class="rating">
              <input type="radio" id="star5" name="rating" value="5">
              <label for="star5"></label>
              <input type="radio" id="star4" name="rating" value="4">
              <label for="star4"></label>
              <input type="radio" id="star3" name="rating" value="3">
              <label for="star3"></label>
              <input type="radio" id="star2" name="rating" value="2">
              <label for="star2"></label>
              <input type="radio" id="star1" name="rating" value="1">
              <label for="star1"></label>
            </div>
          </div>
        </div>
      </div>

    <div class="container">
        <div class="mb-3">
            <label for="descricao" class="form-label">Comentários:</label>
            <textarea class="form-control" id="descricao" rows="4"></textarea>
        </div>
    </div>










    <link rel="stylesheet" href="style.css"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>


</html>