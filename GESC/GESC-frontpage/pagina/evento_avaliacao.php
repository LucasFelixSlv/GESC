<?php
include_once 'header.php';
?>
<!-- Página do evento que foi selecionado!-->

<div>
    <div> 
        <img src="https://placehold.co/1920x1080" class="img-fluid" alt="...">
        <section>
            <h1>Nome do evento.</p>
            <figure class="quote">
            <div class="container">
                <div class="card">
                <div class="card-body">
            <h5 class="card-title">Avalie este evento</h5>
            
            <div class="divAvaliacao">

                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
                <div class="estrelas">
                    <input type="radio" id="cm_star-empty" name="fb" value="" checked/>
                    <label for="cm_star-1"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-1" name="fb" value="1"/>
                    <label for="cm_star-2"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-2" name="fb" value="2"/>
                    <label for="cm_star-3"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-3" name="fb" value="3"/>
                    <label for="cm_star-4"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-4" name="fb" value="4"/>
                    <label for="cm_star-5"><i class="fa"></i></label>
                    <input type="radio" id="cm_star-5" name="fb" value="5"/>
                </div>
                <p>Deixe seu Comentário</p>
                <form action="evento_avaliacao.php" method="post">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nomeUsuario" name="nomeUsuario" required><br><br>

                    <label for="comentario">Comentário:</label>
                    <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>

                    <input type="submit" name="adicionarComentario" value="Enviar Comentário">
                </form>
                
            </div>        
        </section>
    </div>
   </div>

</div>

    

<?php
include_once 'footer.php';
?>