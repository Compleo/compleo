<?php
    session_start();

    include_once("../../php/api/abstract/compelo-api-prenotazione.php");
    include_once("../../php/api/abstract/compleo-api-activity.php");
    include_once("../../php/api/abstract/compleo-api-user.php");

    if (!isset($_SESSION['login'])) {
        header("location: ../../");
    }

    $usr = $_SESSION['datiUtente'];

    //PAGINA CHE VISUALIZZA LE MIE PRENOTAZIONI

    $lavoriMiei = listLavoriPerIDLavoratore($usr["id"]);

    $richieste = array();

    for($i = 0; $i < count($lavoriMiei); $i++) {
        //PRENDO TUTTE LE RICHIESTE COLLEGATE AL LAVORO IESIMO
        $richiesteTMP = getPrenotazioniDaIDLavoro($lavoriMiei[$i]["id"]);

        array_push($richieste, $richiesteTMP);
    }
?>

<html lang="it">
    <head>
        <title>Compleo - Prenotazioni Aperte</title>

        <!-- MetaTags (Google e simili) -->
        <meta name="title" content="Compleo - Compleo - Prenotazioni Aperte">
        <meta name="description" content="Visualizza tutte le prenotazioni aperte dall'utente">  
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- JS !-->
        <script src="https://kit.fontawesome.com/eb2ba5a08b.js" crossorigin="anonymous"></script>

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/style.css">
        <link rel="stylesheet" type="text/css" href="./../../assets/bootstrap-modals.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/bootstrap-grid.min.css">
    <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../../assets/css/style.css" rel="stylesheet">
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
            <?php include_once('navbar.php'); ?>
        <div class="ui stackable container">
            <div class="ui message">
                <div class="six wide right floated column">
                    <h2 class="ui huge header">
                        Le tue prenotazioni
                    </h2>
                    <?php
                        if(!isset($richieste) && count($richieste) == 0)
                        {
                            //Non ho fatto ancora nessuna recensione
                            ?>
                                <p class="lead">
                                    Non hai ancora impegnato nessuna prenotazione. <br>
                                    Questa pagina si sbloccherà non appena impegnerai la tua prima prenotazione.
                                </p>
                                <center>
                                    <div class="ui dividing huge header">Alcuni consigli per incominciare</div>
                                </center>
                                <br>
                                <div class="ui centered cards"> 
                                    <a class="card" href="../../profilo/profilo-opzioni.php">
                                        <div class="content">
                                            <div class="header">Personalizza il tuo profilo</div>
                                            <div class="description">
                                                Personalizzare il tuo profilo renderà il tuo account più accattivante all'occhio per gli altri utenti.
                                            </div>
                                        </div>
                                        <div class="extra content">
                                            <span>
                                                Personalizzati.
                                            </span>
                                        </div>
                                    </a>
                                    <a class="card" href="../../profilo/">
                                        <div class="content">
                                            <div class="header">Proponiti per un lavoro</div>
                                            <div class="description">
                                                Crea un lavoro ed inizia a lavorare grazie a Compelo.
                                            </div>
                                        </div>
                                        <div class="extra content">
                                            <span>
                                                Un piccolo click adesso, grandi lavori domani.
                                            </span>
                                        </div>
                                    </a>
                                    <a class="card" href="../../offerte/">
                                        <div class="content">
                                            <div class="header">Cerca un lavoro</div>
                                            <div class="description">
                                                Cerchi un Idraulico? Un Muratore? Nessun problema, Compelo è qui per aiutarti.
                                            </div>
                                        </div>
                                        <div class="extra content">
                                            <span>
                                                Cerca il lavoratore che fa per te adesso.
                                            </span>
                                        </div>
                                    </a>     
                                </div>
                                <?php
                                    if($usr["livello"] == "Completo") {
                                        ?>
                                            <div class="ui two item menu">
                                                <a class="item" href="./">Create da Me</a>
                                                <a class="item active" href="./dirette.php">Dirette a Me</a>
                                            </div>
                                        <?php
                                    } else {
                                        header("locatioin: ./");
                                    }
                                    ?>
                                <p class="lead">
                                    Torna qui quando sarai stato contattato da un utente.
                                </p>
                            <?php
                        } else {
                            //Ho creato delle prenotazioni
                            ?>
                                <p class="lead">
                                    Visualizza tutte le prenotazioni che ti sei impegnato di portare avanti.
                                </p>
                            <?php
                            if($usr["livello"] == "Completo") {
                                ?>
                                    <div class="ui two item menu">
                                        <a class="item" href="./">Create da Me</a>
                                        <a class="item active" href="./dirette.php">Dirette a Me</a>
                                    </div>
                                <?php
                            } else {
                                header("locatioin: ./");
                            }
                            ?>
                                <div class="ui items">
                                    <?php
                                        for($i = 0; $i < count($richieste[0]); $i++) {
                                            $lavoro = getLavoroPerID($richieste[0][$i]["idLavoro"]);
                                            $utente = getUserByID($richieste[0][$i]["idRichiedente"]);

                                            $color = "green";

                                            switch ($richieste[0][$i]["stato"]) {
                                                case statusRichiesto:
                                                    $color = "orange";
                                                    break;
                                                case statusAccettato:
                                                    $color = "green";
                                                    break;
                                                case statusInProgresso:
                                                    $color = "blue";
                                                    break;
                                                case statusDaPagare:
                                                    $color = "red";
                                                    break;
                                                default:
                                                    $color = "grey";
                                                    break;
                                                }

                                            echo '
                                            <div class="item">
                                                <div class="content">
                                                    <div class="header">'.$lavoro["titolo"].'</div>
                                                    <div class="description">
                                                        <a class="header" href="../../profilo/esplora?usr='.strtolower($utente["nome"].".".$utente["cognome"]).'"><p>'.$utente["nome"].' '.$utente["cognome"].'</p></a>
                                                    </div>
                                                    <div class="meta">
                                                        <h4 class="ui '.$color.' header">'.$richieste[0][$i]["stato"].'</h4>
                                                    </div>
                                                    <div class="extra">
                                                        <a href="../../chat/"><button class="ui button"><i class="far fa-comments"></i></button></a>
                                                        Accedi alla chat
                                                    </div>
                                                </div>
                                            </div>
                                            ';
                                        }
                                    ?>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>

        <?php include_once('footer.php'); ?>

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

