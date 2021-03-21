<?php
  session_start();

  if (isset($_SESSION['login'])) {
    include_once('top_login.php');
  }
  else {
    include_once('top.php');
    header('Location:index.php');
  }
?>

<section id="contatti" class="about d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100"> 
        <div class="section-title">
          <h2>I contatti di Compleo</h2>
        </div>
        
        <form action="invia.php">
          <div class="row d-flex justify-content-center align-items-center ">    
            <div class="col-8">

              <div class="form-group mt-2">
                  <label for="inputName" class="control-label">Inserisci il tuo nome</label>
                  <input type="text" class="form-control" id="inputName" aria-labelledby="messaggioNome">
                  <small id="messaggioNome" class="form-text text-muted">Inserisci il tuo nome</small>
              </div>

              <div class="form-group mt-2">
                <label for="inputEmail" class="control-label">Inserisci la tua email</label>
                <input type="email" class="form-control" id="inputEmail" aria-labelledby="messagioEmail">
                <small id="messaggioEmail" class="form-text text-muted">Inserisci un indirizzo email valido</small>
              </div>

              <div class="form-group mt-2">
                <label for="inputText">Inserisci il testo del messaggio</label>
                <textarea class="form-control" id="inputText" rows="6"></textarea>
              </div>

              <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" value="" id="inviaCopia">
                <label class="form-check-label" for="inviaCopia">Invia copia messaggio al mio indirizzo email</label>
              </div>

              <div class="form-group mt-2">
                <label for="inputFile">Allega un documento (facoltativo)</label>
                <input type="file" class="form-control-file" id="inputFile">
              </div>

            </div>
          </div>
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8 text-center">
              <button type="submit text-center" class="btn btn-primary mb-2">Invia</button>
            </div>
          </div>
        </form>

</div>

</div>





    

    </div>
</section>

<?php
include_once('footer.php');

?>