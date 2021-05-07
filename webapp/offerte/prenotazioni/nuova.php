<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location: ../../");
    }

    //PAGINA CHE PERMETTERÀ DI CREARE UNA NUOVA PRENOTAZIONE
?>