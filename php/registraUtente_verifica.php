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
   $username = isset($_POST['username']) ? $_POST['username'] : null;
   $password = isset($_POST['password']) ? $_POST['password'] : null;

   print($nome.','. $cognome.'<br>');

   if($nome != null && $cognome != null && $cf != null && $indirizzo != null && $regione != null && $provincia != null && $comune != null && $telefono != null && $username != null && $password != null)
   {
      //i dati vanno bene
      registraUtente($nome, $cognome, $cf, $indirizzo, $comune, $regione, $provincia, $telefono, $username, $password);
      header('Location: ..\index.php');
   }
   else{
      //header('Location: ..\registraUtente.php');
   }
   
?>