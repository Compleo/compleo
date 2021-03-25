<?php
session_start();

if (!(isset($_SESSION['login']) && $_SESSION['login'] == true))
{
    header("location: login.php");
}

//TODO: PRIMA DI INIZIARE CON LA SUA IMPLEMENTAZIONE, IMPLEMENTARE IL FILE SEGUENTE
include_once('./api/abstract/compleo-api-activity.php');

?>