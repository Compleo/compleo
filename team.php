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
          <h2>Il Team di Compleo</h2>
        </div>
        <div class="col d-flex justify-content-center">
              <img src="assets/img/team.jpg" class="img-fluid" alt="">
        </div>
    </div>
</section>


<?php
include_once('footer.php');

?>