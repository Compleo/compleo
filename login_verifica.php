<?php
  session_start();

  include_once('db.php');


  if (isset($_POST['username']) && isset($_POST['password'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    /* Preparazione dell'interrogazione SQL con uso di parametri */
    $dsn = "mysql:host=$server;dbname=$db;";
    $sql = "SELECT * FROM Utente WHERE Account='$user';";

    try {

      /* Apertura della connessione */
      $connessione = new PDO($dsn, $userdb, $userps);

      $sql_ris = $connessione->query($sql);
      $user_dati = $sql_ris->fetch(PDO::FETCH_OBJ);  

      if ($user_dati) {

        if ($user_dati->Password == $pass) {
          /* Le password coincidono, l'utente è autenticato */
          $_SESSION['login'] = $user_dati;
          $_SESSION['errore'] = "";
          header('Location:index.php');
        }
        else {
          /* Le password sono diverse, l'utente viene rimandato alla pagina di login */
          $_SESSION['errore'] = "Account e/o password non corrispondono...";
          header('Location:login.php');
        }

      }

      $connessione = null;
 
    } catch (PDOException $e) {
    
      /* da sostituire con una alert, se necessario */
      throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
  }
?>
