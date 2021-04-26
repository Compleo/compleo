<?php
  session_start();
  setcookie("cuser",$user,time()-3600);
  setcookie("cpass",$password,time()-3600);

  session_unset();

  header('Location: ..\index.php');

?>
