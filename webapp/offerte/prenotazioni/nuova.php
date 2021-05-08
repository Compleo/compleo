<?php
    session_start();

        //Error reporting
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL | E_STRICT);
    

    include_once("../../php/api/abstract/compelo-api-prenotazione.php");
    include_once("../../php/api/abstract/compleo-api-user.php");
    include_once("../../php/api/abstract/compleo-api-activity.php");

    if (!isset($_SESSION['login'])) {
        header("location: ../../");
    }

    //PAGINA CHE PERMETTERÀ DI CREARE UNA NUOVA PRENOTAZIONE

    if(isset($_GET['idLav']) && isset($_GET['idUtente'])) {
        $idLav = $_GET['idLav'];
        $idUtente = $_GET['idUtente'];

        $lavoro = getLavoroPerID($idLav);
        $utente = getUserByID($idUtente);
    } else {
        header("location: ../../");
    }

    function nuovaCard($disponibilitaAt, $idLav) {
        $giorno = $disponibilitaAt["'giorno'"];
        $oraInizio = $disponibilitaAt["'oraInizio'"];
        $oraFine = $disponibilitaAt["'oraFine'"];

        $json = urlencode(json_encode($disponibilitaAt));

        return '
        <div class="column col-md-4" style="padding: 15px">
            <div class="ui fluid card">
                <div class="content">
                    <div class="header">
                        '.$giorno.'
                    </div>
                    <div class="description">
                        <p><b>Ora di Inizio: <b>'.$oraInizio.'</p>
                        <p><b>Ora di Fine: <b>'.$oraFine.'</p>
                    </div>
                    <div class="meta">
                        Le fasce orarie posso variare a discrezione dell'."'".'utente, sono indicative
                    </div>
                </div>
                <div class="extra content">
                    <a class="ui header" href="../../php/add-prenotazione.php?j='.$json.'&il='.$idLav.'"><button class="ui button" style="margin: 10px;">Seleziona</button></a>
                </div>
            </div>
            
        </div>';
    }
?>

<html lang="it">
    <head>
        <title>Compleo - Offerte</title>

        <!-- MetaTags (Google e simili) -->
        <meta name="title" content="Compleo - Offerte">
        <meta name="description" content="Visualizza tutte le offerte attive su Compelo">  
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/style.css">
        <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="../../assets/bootstrap-grid.min.css">
        <style>
            .card{
                text-decoration: none;
            }
            a.disabled {
                pointer-events: none;
                cursor: default;
            }
        </style>
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
                                    <a class="item" href="../profilo/login.php">
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
                    <h1 class="ui huge header">Prenota il lavoro di <?php echo $utente["nome"].' '.$utente["cognome"]; ?></h1>
                    <p class="lead">
                        Inizia il contatto col lavoratore scegliendo una fascia oraria indicativa tra quelle previste dall'utente.
                    </p>
                    <h3 class="ui medium header">Titolo</h3>
                    <p class="lead"><?php echo $lavoro["titolo"]; ?></p>
                    <h3 class="ui medium header">Testo</h3>
                    <p class="lead"><?php echo $lavoro["testo"]; ?></p>
                    <div class="ui dividing header"></div>
                    <br>
                    <h3 class="ui medium header">Seleziona una fascia oraria</h3>
                    <br>
                    <div class="ui cards row">
                        <?php
                            $assoc = json_decode($lavoro["disponibilita"], true);

                            for($i = 0; $i < count($assoc); $i++) {
                                echo nuovaCard($assoc[$i], $idLav);
                            }
                        ?>
                    </div>
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
