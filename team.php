<?php
  session_start();
  $n = "Team";

  if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    include_once('./components/top-logged.php');
  }
  else {
    include_once('./components/top.php');
  }
?>

<?php
  include_once('components/footer.php');
?>