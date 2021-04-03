<?php
    session_start();
?>

<html lang="it">
    <head>
        <title>Compleo - WebApp</title>

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="./assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="./assets/style.css">
    </head>
    <body>
        <!-- MENU !-->
            <div class="ui large top fixed stackable menu">
                <div class="ui container">
                    <a class="item" href="../"><img src="./assets/logo.png"></a>
                    <a class="active item" href="./">
                        Home
                    </a>
                    <a class="item">
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
                                        '.$usr["nome"].' '.$usr["cognome"].'
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <a class="item" href="./profilo/">Profilo</a>
                                            <a class="item" href="./php/logout.php">Esci</a>
                                        </div>
                                    </div>   
                                ';
                            } else {
                                echo '
                                    <a class="item" href="./profilo/login.php">
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
                <div class="six wide right floated column homeImg">
                </div>
                <div class="imgText">
                    <h1 class="ui huge header">
                        Benvenuto in Compleo
                    </h1>
                    <p class="lead">
                        Piccoli servizi, al Completo.
                    </p>
                </div>
                <h2>
                    Ultime Aggiunte

                    <?php
                        //TODO: IMPLEMENTA
                    ?>
                </h2>
            </div>

        </div>

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="./assets/semantic/semantic.min.js"></script>
    </body>
</html>