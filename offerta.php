<?php
  session_start();

  include_once("./php/api/abstract/compleo-api-activity.php");

  $n = "Crea Un'Offerta";

  if (isset($_SESSION['login']) && $_SESSION['login'] == true)
  {
    include_once('./components/top-logged.php');
  }
  else
  {
    header("location: ./");
  }

  $attivita = listQualifiche();
?>

<section id="offerta" class="about d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100"> 
        <div class="section-title">
          <h2>Offerta</h2>
          <h3>BETA</h3>
          <form action="" method="GET">
            <div class="row">
              <label for="remember_me">Tipologia offerta</label>
              <?php
                echo "<select name=\"tipologia\">";

                foreach ($attivita as $descr) {
                  echo "<option value=\"" . $descr . "\">" . $descr . "</option>";
                }
                echo "</select>";
              ?>
            </div>
          </form>
        </div>
    </div>
</section>

<?php
  include_once('./components/footer.php');
?>
