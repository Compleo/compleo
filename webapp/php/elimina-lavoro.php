<?php 
    session_start();
    include_once("../../php/api/abstract/compleo-api-activity.php");

    if(isset($_SESSION['login']) && $_SESSION['login'] == true)
    {
        $lavoro = $_GET['id'];
        EliminaLavoroDaIdUser($lavoro);
    }



?>
