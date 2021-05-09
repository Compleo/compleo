<?php
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("./api/abstract/compelo-api-prenotazione.php");
    include_once("./api/abstract/compleo-api-chat.php");
    
    if (!(isset($_SESSION['login']) && $_SESSION['login'] == true))
    {
        header("location: ../");
    }

    if(!(isset($_GET['j']))) {
        header("location: ../");
    }

    if(!(isset($_GET['il']))) {
        header("location: ../");
    }

    if(!(isset($_GET['iu']))) {
        header("location: ../");
    }
    
    $idUtente = $_GET['iu'];
    $id = $_SESSION['datiUtente']['id'];
    $idLav = $_GET['il'];
    $scelta = addslashes($_GET['j']);

    NuovaChat($id, $idUtente);
    nuovaPrenotazione($id, $idLav, $scelta);

    header("location: ../offerte/prenotazioni");
?>