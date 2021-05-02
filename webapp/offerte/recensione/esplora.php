<?php

session_start();

include_once("../../php/api/abstract/compleo-api-recensioni.php");
include_once("../../php/api/abstract/compleo-api-user.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET["id"])) {
    $rec = getRecensioneByID($_GET["id"]);
    $utenteRecensore = getUserByID($rec->idRecensore);
    $utenteRecensito = getUserByID($rec->idRecensito);
} else {
    header("location: ../");
}

?>

<html lang="it">

<head>
    <title>Compleo - Esplora Refcensione</title>

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
                <div class="item">
                    <div class="ui icon input">
                        <input type="text" placeholder="Cerca...">
                        <i class="search link icon"></i>
                    </div>
                </div>
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                    $usr = $_SESSION['datiUtente'];
                    echo '
                                    <div class="ui simple dropdown item">
                                        <i class="user icon"></i>
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <div class="header">' . $usr["nome"] . ' ' . $usr["cognome"] . '</div>
                                            <a class="item" href="../../profilo/"><i class="address card icon"></i>Profilo</a>
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
                <h1 class="ui huge header">Recensione di <?php echo $utenteRecensore["nome"] . ' ' . $utenteRecensore["cognome"]; ?></h1>
                <table class="ui celled padded table">
                    <thead>
                        <tr>
                            <th class="single line">Voto</th>
                            <th>Utente Recensito</th>
                            <th>Titolo</th>
                            <th>Testo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <?php
                                    echo '
                                    <img src="../../assets/img/voti/'.$rec->valore.'.png"> ';
                                ?>
                            </td>
                            <td class="single line">
                                <?php
                                echo '
                                <a href="../../profilo/esplora/?usr='.$utenteRecensito["username"].'">'; ?>
                                    <?php 
                                        echo $utenteRecensito["nome"].' '.$utenteRecensito["cognome"];
                                    ?>
                                </a>
                            </td>
                            <td>
                                <?php 
                                    echo $rec->titolo;
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo $rec->testo;
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- JS !-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../../assets/semantic/semantic.min.js"></script>
</body>

</html>