<?php

session_start();

/*
   ***************************************
           Compleo Source Code
   ***************************************
   Programmer: Leonardo Baldazzi   (git -> @squirlyfoxy)
                                   (instagram -> @leonardobaldazzi_)

   Il seguente codice contiene i metodi per permettono di aggiornare i dati di un utente

   THE FOLLOWING SOURCE CODE IS CLOSED SOURCE
*/

include_once('./api/abstract/compleo-api-user.php');

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $usr = $_SESSION['datiUtente'];

    $id = $usr["id"];
    $password = $usr["password"];
    $bio = $usr["bio"];
    $telefono = $usr["telefono"];
    $email = $usr["email"];
    $piva = $usr["piva"];

    //Controllo la password
    if(isset($_POST["password"]) && isset($_POST["password2"]) &&
        ($_POST["password"] != "" && $_POST["password2"] != "") && 
        ($_POST["password"] != " " && $_POST["password2"] != " ") &&
        ($_POST["password"] == $_POST["password2"])) {
            $password = md5($_POST["password"]);
        } else {
            if (($_POST["password"] != "" && $_POST["password2"] != "") && 
            ($_POST["password"] != " " && $_POST["password2"] != " ") &&
            ($_POST["password"] != $_POST["password2"])) {
                header("location: ./profilo/profilo-opzioni.php");
            }
        }

    //Controllo la bio
    if(isset($_POST["bio"])) {
        $bio = $_POST["bio"];
    }

    //Controllo il telefono
    if(isset($_POST["telefono"])) {
        $telefono = $_POST["telefono"];
    }

    //Controllo la mail
    if(isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    //Controllo la partita iva
    if(isset($_POST["piva"])) {
        $piva = $_POST["piva"];
    }

    aggiornaUtente($id, $telefono, $email, $bio, $piva, $password);
    
    session_start();
  
    session_unset();
  
    header('Location: ../../profilo');
} else {
    header("location: ../");
}

?>
