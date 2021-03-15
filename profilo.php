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


<section id="profilo" class="about d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100"> 
        <div class="section-title">
          <h2>Profilo</h2>
        </div>
    </div>
</section>


<?php
include_once('footer.php');

?>