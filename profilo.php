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
          <?php echo $usr->Nome; echo " "; echo $usr->Cognome;?> <br>
          <hr>
          Codice Fiscale: <?php echo $usr->CF; ?> <br>
          Indirizzo: <?php echo $usr->Indirizzo; ?> <br>
          Numero di Telefono: <?php echo $usr->Telefono; ?> <br>
        </div>
    </div>
</section>

<?php
  include_once('./components/footer.php');
?>
