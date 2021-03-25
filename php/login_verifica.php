<?php
  session_start();

  include_once('./api/compleo-api.php');

  if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $data_array = array(
      "username"      => $user,
      "password"      => $pass,
    );

    try {
      $api_call = callAPI('POST', '127.0.0.1:5051/user', json_encode($data_array));
      $response = json_decode($api_call, true);

      if(isset($response["message"]) && $response["message"] == "userNotFound")
      {
        $_SESSION['errore'] = "Account e/o password non corrispondono...";
        header('Location: ..\login.php');
      } else {
        $_SESSION['datiUtente'] = $response;

        $_SESSION['login'] = true;

        $_SESSION['errore'] = "";
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
