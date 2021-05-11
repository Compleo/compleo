<?php
    session_start();

    //Error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL | E_STRICT);

    if(isset($_GET['idChat'])) {
        $idChat = $_GET['idChat'];
    }

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    } else  {
        header("location: ../");
    }

    $usr = $_SESSION['datiUtente'];

    include_once("../php/api/abstract/compleo-api-chat.php");
    include_once("../php/api/abstract/compleo-api-user.php");

    $chats = GetChatsUtenteDestinatario($usr["id"]);
?>

<html lang="it">
    <head>
        <title>Compleo - Chat</title>

        <!-- MetaTags (Google e simili) -->
        <meta name="title" content="Compleo - Chat">
        <meta name="description" content="Chat di Compelo">  
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- JS !-->
        <script src="https://kit.fontawesome.com/eb2ba5a08b.js" crossorigin="anonymous"></script>

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/style.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-grid.min.css">
        <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- MENU !-->
        <?php include_once('navbar.php'); ?>
        <div class="ui stackable container">
            <div class="ui message">
                <div class="six wide right floated column">
                    <div class="ui internally celled grid">
                        <div class="row">
                            <div class="five wide column">
                                <!-- IL MIO NOME UTENTE !-->
                                <h2 class="ui right floated header"><b><?php echo $usr["nome"].' '.$usr["cognome"].' '; ?></b><i class="fas fa-user fa-lg"></i></h2>
                            </div>
                            <div class="eleven wide column">
                                <!-- NOME UTENTE CHAT SELEZIONATA !-->
                                <h2 class="ui right floated header" id="nomeUtente"></h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="five wide column">
                                <br>
                                <div class="ui items chatItems">
                                    <!-- LISTA DELLE CHAT !-->
                                    <div class="ui dividing header"></div>
                                    <?php 
                                        for($i = 0; $i < count($chats); $i++) {
                                            $s = getUserByID($chats[$i]["idUtenteRichiedente"]);
                                            $img;

                                            if($s['sesso']=='Uomo')
                                            {
                                                $img = '<img class="usrImage" src="../assets/user-uomo.png">';
                                            }
                                            elseif($s['sesso'] == 'Donna')
                                            {
                                                $img = '<img class="usrImage" src="../assets/user-donna.png">';
                                            }
                                            else
                                            {
                                                $img = '<img class="usrImage" src="../assets/user.png">';
                                            }

                                            echo '
                                            <div class="ui item">
                                                <div class="ui tiny image">
                                                    '.$img.'
                                                </div>
                                                <div class="ui content">
                                                    <a class="header chChat" id="'.$chats[$i]["id"].'">'.$s["nome"].' '.$s["cognome"].'</a>
                                                    <div class="meta">
                                                        Utente di livello <b>'.$s["livello"].'</b>
                                                    </div>
                                                    <div class="extra">
                                                        Ciao Ciao Ciao Ciao
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ui dividing header"></div>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="ui segment eleven wide column row">
                                <!-- CHAT !-->
                                <div class="chat">
                                    <div class="ms">
                                        <!-- MESSAGGI !-->
                                    </div>
                                    <div class="ui center aligned grid ch">
                                        <!-- BOTTOM !-->
                                        <div class="ui input focus inp">
                                            <input class="txt" id="msg" type="text" placeholder="Messaggio...">
                                            <button class="ui btn" id="msgBtn"><i class="fas fa-paper-plane fa-lg"></i></button>
                                        </div>
                                    </div>
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
        <script src="./js/client.js"></script>
        <script>
            exampleSocket.onopen = function (event) {
                console.log("Connessione stabilita con il server realtime");

                RegMe(<?php echo $usr["id"]; ?>);

                <?php
                    if(isset($idChat)) {
                        echo '
                            ChangeCurrentChat('.$idChat.');';
                    }
                ?>
            }
        </script>
    </body>
</html>
