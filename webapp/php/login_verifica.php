<?php
  session_start();

  include_once('./api/abstract/compleo-api-user.php');
  include_once('generate_cookie_login.php');
  $_SESSION['errore'] = "";

  if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    try {
      $response = getUserByUsernameAndPassword($user, $pass);

      if(isset($response["message"]) && $response["message"] == "userNotFound")
      {
        $_SESSION['errore'] = "Account e/o password non corrispondono...";      
        header('Location: ..\profilo\login.php');
      } else {
        $_SESSION['datiUtente'] = $response;

        $_SESSION['login'] = true;

        $_SESSION['errore'] = "";
        if(isset($_POST['remember'])){
          generateCookie($_POST['username'],$_POST['password'],$_POST['id']);
        }
        header('Location: ..\index.php');
      }
    } catch (Exception $e) {
    
      /* da sostituire con una alert, se necessario */
      throw new Exception($e->getMessage(), (int)$e->getCode());
    }
  } else {
    header('Location: ..\login.php');
  }
?>
