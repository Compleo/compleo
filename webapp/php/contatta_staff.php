<?php
    session_start();

    if(isset($_SESSION['login']) && $_SESSION['login'] == true)
    {
        $messaggio = $_POST['messaggio_staff'];
        
        $messaggio = wordwrap($messaggio, 70, "\r\n");



        $to      = 'compleo.administration@gmail.com';
        $subject = 'Richiesta Contantto:'.$_SESSION['datiUtente']->username.' id:'.$_SESSION['datiUtente']->id;
        $headers = "From: webmaster@example.com" . "\r\n" .
                   "CC:".$_SESSION['datiUtente']->email;

        mail($to, $subject, $messaggio,$headers);
        header('Location: ../profilo/index.php');
    }
    


?>