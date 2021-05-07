<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header("location: ../../");
    }

    //PAGINA CHE VISUALIZZA LE MIE PRENOTAZIONI
?>

<html lang="it">
    <head>
        <title>Compleo - Prenotazioni Aperte</title>

        <!-- MetaTags (Google e simili) -->
        <meta name="title" content="Compleo - Compleo - Prenotazioni Aperte">
        <meta name="description" content="Visualizza tutte le prenotazioni aperte dall'utente">  
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/style.css">
        <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-grid.min.css">
    </head>
    <body>
        <!-- MENU !-->
            <div class="ui large top fixed stackable menu">
                <div class="ui container">
                    <a class="item" href="../"><img src="../assets/logo.png"></a>
                    <a class="item" href="../">
                        Home
                    </a>
                    <a class="active item" href="./">
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
                                            <a class="item" href="../profilo/"><i class="address card icon"></i>Profilo</a>
                                            <a class="item" href="../chat"><i class="comment icon"></i>Chat</a>
                                            <a class="item" href="../php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
                                        </div>
                                    </div>   
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        <div class="ui stackable container">
            <div class="ui message">
                <div class="six wide right floated column">
                    <h1>DA IMPLEMENTARE</h1>
                </div>
            </div>
        </div>

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../../assets/semantic/semantic.min.js"></script>
        <script sr="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script>
        </script>
        
    </body>
</html>
