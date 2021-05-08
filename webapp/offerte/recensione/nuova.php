<?php

session_start();

include("../../php/api/abstract/compleo-api-activity.php"); 
include("../../php/api/abstract/compleo-api-user.php"); 

if(isset($_GET["idRecensire"]) && isset($_GET["idRichiestaLavoro"])) {
    $idRecensire = $_GET["idRecensire"];
    $idRichiestaLavoro = $_GET["idRichiestaLavoro"];

    //Prendo info utente
    $utenteRecensito = getUserByID($idRecensire);
} else {
    header("location: ../../");
}

?>

<html lang="it">
    <head>
        <title>Compleo - Nuova Recensione</title>

        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/style.css">
    </head>
    <body>
        <!-- MENU !-->
            <div class="ui large top fixed stackable menu">
                <div class="ui container">
                    <a class="item" href="../../../"><img src="../../assets/logo.png"></a>
                    <a class="item" href="../../">
                        Home
                    </a>
                    <a class="active item" href="../">
                        Offerte
                    </a>
                    <div class="right menu">
                        <?php
                            if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                $usr = $_SESSION['datiUtente'];
                                echo '
                                    <div class="ui simple dropdown item">
                                        <i class="user icon"></i>
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <div class="header">'.$usr["nome"].' '.$usr["cognome"].'</div>
                                            <a class="item" href="../../profilo"><i class="address card icon"></i>Profilo</a>
                                            <a class="active item" href="../../offerte/prenotazioni"><i class="money bill alternate icon"></i>Prenotazioni</a>
                                            <a class="item" href="../../chat"><i class="comment icon"></i>Chat</a>
                                            <a class="item" href="../../php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
                                        </div>
                                    </div>   
                                ';
                            } else {
                                echo '
                                    <a class="item" href="../../profilo/login.php">
                                        Login | Registrati
                                    </a>   
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        <div class="ui stackable container">
            <div class="ui message">
                <div class="six wide right floated column">
                    <h1 class="ui huge header">DA IMPLEMENTARE</h1>
                </div>
            </div>

        </div>

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../../assets/semantic/semantic.min.js"></script>
    </body>
</html>
