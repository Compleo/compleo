<?php 
    session_start();
    include_once('./api/abstract/compleo-api-user.php');
    include_once('./api/abstract/compleo-api-activity.php');

    $recensito = getUserByUsername($_POST['recensito']);
    $recensore = getUserByUsername($_POST['recensore']);

    $idRecensito = $recensito['id'];
    $idRecensore = $recensore['id'];
    $voto =  $_POST['voto'];
    $titolo = $_POST['titolo'];
    $testo = $_POST['testo'];

    addRecensione($idRecensito,$idRecensore,$voto,$titolo,$testo);
    
?>

    <