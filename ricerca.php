<?php
  session_start();

  $login = null;

  if (isset($_SESSION['login'])) 
  {
    include_once('top_login.php');
    $login = $_SESSION['login'];
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
        </div>
    </div>
</section>


<?php
include_once('footer.php');

?>