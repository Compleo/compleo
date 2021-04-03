<?php
   include_once('./api/abstract/compleo-api-user.php');

   $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
   $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : null;
   $cf = isset($_POST['CF']) ? $_POST['CF'] : null;
   $indirizzo = isset($_POST['indirizzo']) ? $_POST['indirizzo'] : null;
   $regione = isset($_POST['regione']) ? $_POST['regione'] : null;
   $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : null;
   $comune = isset($_POST['comune']) ? $_POST['comune'] : null;
   $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
   $email = isset($_POST['email']) ? $_POST['email'] : null;
   $password = isset($_POST['password']) ? md5($_POST['password']) : null;
   $password2 = isset($_POST['password2']) ? md5($_POST['password2']) : null;

   if($nome != null && $cognome != null && $cf != null && $indirizzo != null && $regione != null && $provincia != null && $comune != null && $telefono != null && $password != null && $password == $password2)
   {
      //i dati vanno bene
      registraUtente($nome, $cognome, $cf, $indirizzo, $comune, $regione, $provincia, $telefono, $email, $password);
      header('Location: ..\index.php');
   }
   else{
      //TODO: ERRORE
      header('Location: ..\registraUtente.php');
   }
   
?>