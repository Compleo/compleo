<?php
  session_start();

  $usr;
  $n = "Offerta";

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

<section id="offerta" class="about d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100"> 
        <div class="section-title">
          <h2>Offerta</h2>
        </div>
    </div>
</section>

<?php
  include_once('./components/footer.php');
?>
