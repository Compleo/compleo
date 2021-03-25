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

<div class="container">
    <form action="php/offerta_processor.php" class="form-group" method="post">
        <div class="form-group">

        </div>
        <div class="form-group">
        
        </div>
        <div class="form-group">
            <input type="submit" value="Invia" class="btn">
        </div>
    </form>
</div>

<?php
  include_once('./components/footer.php');
?>
