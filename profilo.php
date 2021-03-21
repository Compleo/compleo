<?php
  session_start();

  $login = null;

  if (isset($_SESSION['login'])) {
    include_once('top_login.php');
    $login = $_SESSION['login'];
  }
  else {
    include_once('top.php');
    header('Location:index.php');
  }
?>


<section id="profilo" class="about d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100"> 
      <div class="section-title">
          <h2>Profilo</h2>
      </div>

      <div class="col d-flex justify-content-center">
        <div class="card" style="width: 18rem">
          <div class="card-body">
            <h5 class="card-title d-flex justify-content-center"><?php echo $login->Account; ?></h5>
            <img src="assets/img/avatar.svg" class="card-img-top" alt="Immagine account" />
            <p class="card-text ">
              Questi sono i dati del profilo:
            </p>
          </div>       
            <table class="table table-striped">
              <tr><td>Nome:</td><td><?php echo $login->Nome; ?></td></tr>
              <tr><td>Cognome</td><td><?php echo $login->Cognome; ?></td></tr>
              <tr><td>Cod.Fiscale</td><td><?php echo $login->CF; ?></td></tr>
              <tr><td>Indirizzo</td><td><?php echo $login->Indirizzo; ?></td></tr>
              <tr><td>Telefono</td><td><?php echo $login->Telefono; ?></td></tr>
            </table>
            <div class="col d-flex justify-content-center">
              <a href="#" class="btn btn-primary">Modifica</a>
            </div>          
        </div>
      </div>
    </div> <!-- fine container -->

    </div>
</section>


<?php
include_once('footer.php');

?>