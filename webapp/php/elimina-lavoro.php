<?php 
    session_start();
    include_once("./api/abstract/compleo-api-activity.php");

    if(isset($_SESSION['login']) && $_SESSION['login'] == true)
    {
        $lavoro = $_GET['id'];
        eliminaLavoroDaIdUser($lavoro);

        header("location: ../profilo");
    } else {
        header("location: ../");
    }



?>
