<?php
  session_start();

  $usr;
  $n = "Profilo";

  if (isset($_SESSION['login']) && isset($_SESSION['datiUtente']))
  {
    include_once('./components/top-logged.php');

    $usr = $_SESSION['datiUtente'];
  }
  else
  {
    header("location: ./");
  }
?>

<section id="profilo" class="about d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100"> 
        <div class="section-title">
          <h2>Profilo</h2> <br>
          <?php echo $usr["nome"]; echo " "; echo $usr["cognome"];?> <br>
          <hr>
          Codice Fiscale: <?php echo $usr["cf"]; ?> <br>
          Indirizzo: <?php echo $usr["indirizzo"]; ?> <br>
          Numero di Telefono: <?php echo $usr["telefono"]; ?> <br>
        </div>
    </div>
</section>

<?php
  include_once('./components/footer.php');
?>
