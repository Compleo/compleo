<?php
    /*
        ***************************************
                Compleo Source Code             
        ***************************************
        Programmer: Leonardo Baldazzi   (git -> @squirlyfoxy)
                                        (instagram -> @leonardobaldazzi_)

        Il seguente codice gestisce l'eleminazione di un utente

        THE FOLLOWING SOURCE CODE IS CLOSED SOURCE, COPYRIGHT (C) 2021 - COMPLEO
    */

    session_start();

    include_once("./api/abstract/compleo-api-user.php");

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        $usr = $_SESSION['datiUtente'];
        
        $id = $usr["id"];

        //TODO: RICHIEDI CONFERMA

        rimuoviUtente($id);

        header("location: ./logout.php");   //REDIRECT ALLA PAGINA DI LOGIN
    } else {
        header("location: ../");
    }
?>