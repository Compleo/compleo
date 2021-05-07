<?php
    session_start();

    include_once("../../php/api/abstract/compelo-api-prenotazione.php");

    if (!isset($_SESSION['login'])) {
        header("location: ../../");
    }

    //PAGINA CHE PERMETTERÀ DI CREARE UNA NUOVA PRENOTAZIONE
?>