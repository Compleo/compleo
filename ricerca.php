<?php
  session_start();

  $n = "Cerca un Lavoro";

  if (isset($_SESSION['login']) && $_SESSION['login'] == true) 
  {
    include_once('./components/top-logged.php');
  }
  else 
  {
    header('Location:index.php');
  }
?>


<section id="contatti" class="about d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100"> 
        <div class="section-title">
          <h2>Ricerca</h2>
          <h3>BETA</h3> <br>
          <form action="./php/find-activity.php" method="GET">
          </form>
        </div>
    </div>
</section>


<?php
  include_once('./components/footer.php');
?>