<?php
    session_start();

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once("./api/abstract/compelo-api-prenotazione.php");

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

    $id = $_SESSION['datiUtente']['id'];
    $idLav = $_GET['il'];
    $scelta = json_decode($_GET['j']);

    nuovaPrenotazione($id, $idLav, $scelta);

    header("location: ../offerte/prenotazioni");
?>