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
                    <a class="item" href="../offerte/">
                        Offerte
                    </a>
                </div>
            </div>

            <div class="ui middle aligned grid child">
                <div class="column">
                    <div class="ui center aligned page grid">
                        <h2>Seleziona un tipo di account</h2>
                        <div class="ui cards">
                                <div class="card">
                                    <div class="content">
                                        <div class="header">
                                            Account Base
                                        </div>
                                        <div class="meta">
                                            Il modo più semplice per accedere ai servizi di Compleo.
                                        </div>
                                        <div class="description">
                                            Con l'account base accedi alla possibilità di trovare lavoratori, da un semplice maggiordomo ad un elettricista passando per il tuo infermiere di fiducia. I costi? la volontà di iscriversi
                                            <br>
                                            <br>
                                            <center>
                                                <a href="./registrati-base.php">
                                                    <button class="ui button">
                                                        Seleziona
                                                    </button>
                                                </a>
                                            </center>
                                            <br>
                                            Puoi passare all'account completo in qualsiasi momento.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="content">
                                        <div class="header">
                                            Account Completo
                                        </div>
                                        <div class="meta">
                                            Ottieni la possibilità di lavorare con noi.
                                        </div>
                                        <div class="description">
                                            Con l'account Completo ottieni la possibilità di proporti come lavoratore senza perdere i benefici dell'account Base. Compleo è il modo migliore per iniziare a fare piccoli lavoretti in modo del tutto legale e veloce; Inizia subito!
                                            <br>
                                            <br>
                                            <br>
                                            <center>
                                                <a href="./registrati-completo.php">
                                                    <button class="ui button">
                                                        Seleziona
                                                    </button>
                                                </a>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                        </div>
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