<?php
    session_start();

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("location: ./");
    }
?>

<html lang="it">
    <head>
        <title>Compleo - Registrati</title>

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/loginStyle.css">
    </head>
    <body>
        <!-- MENU !-->
            <div class="ui large top fixed stackable menu">
                <div class="ui container">
                    <a class="item" href="../../"><img src="../assets/logo.png"></a>
                    <a class="item" href="../">
                        Home
                    </a>
                    <a class="item">
                        Offerte
                    </a>
                </div>
            </div>

            <div class="ui middle aligned grid child">
                <div class="column">
                    <div class="ui center aligned page grid">
                        <form method="POST" action="../php/registraUtente_verifica.php">

                        </form>
                    </div>
                </div>
            </div>


        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../assets/semantic/semantic.min.js"></script>
    </body>
</html>