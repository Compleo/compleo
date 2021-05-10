<?php
    session_start();

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("location: ./");
    }
?>

<html lang="it">
    <head>
        <title>Compleo - Registrati</title>

        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/loginStyle.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-grid.min.css">
        <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- MENU !-->
            <?php include_once('navbar.php'); ?>

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

            <?php include_once('footer.php'); ?>

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../assets/semantic/semantic.min.js"></script>
    </body>
</html>