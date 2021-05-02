<?php
    session_start();
    include_once 'php/api/abstract/compleo-api-activity.php';
    include_once 'php/api/abstract/compleo-api-user.php';
    $allWork = listTuttiILavori();
    $bC = "";
    function cartaLavoro($idLav, $titolo, $testo, $tipo, $idUtente)
    {
        $user = getUserByID($idUtente);
        $nomeUtente = $user["nome"] . " " . $user["cognome"];
        $usrName = strtolower($user["nome"].'.'.$user["cognome"]);

        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

            $usr = $_SESSION['datiUtente'];
            if($usr["username"] == $usrName) {
                $bC = '<button class="ui disabled button" style="margin-right: 10px;">Contatta</button>';
            }
            else{
                $bC = '<button class="ui button" style="margin-right: 10px;">Contatta</button>';    
            }
        } else {
            $bC = '<a href="./profilo"><button class="ui button" style="margin-right: 10px;">Contatta</button></a>';
        }

        //per il botton contatta useremo l'idUtente
        return '
        <div class="column">
            <div class="ui fluid card">
                <div class="content">
                <div class="header">
                    '.$titolo.'
                </div>
                <div class="meta">
                    '.$tipo. ', <a class="header" href="./profilo/esplora/?usr='.$usrName.'"">' .$nomeUtente.'</a>
                </div>
                <div class="description">
                    '.$testo.'
                </div>
                </div>
                <div class="extra content">
                    <div class="ui two buttons" >
                        '.$bC.'
                        <button class="ui button"  tabindex="1" onclick="showPopUp(\''.$titolo.'\', \''.$tipo.'\', \''.$testo.'\', \''.$nomeUtente.'\', \'./profilo/esplora/?usr='.$usrName.'\')">Visualizza</button>
                    </div>
                </div>
            </div>
            
        </div>';
    }
?>

<html lang="it">
    <head>
        <title>Compleo - WebApp</title>

        <!-- MetaTags (Google e simili) -->
        <meta name="title" content="Compleo - WebApp">
        <meta name="description" content="Home della webapp di Compleo">  
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="./assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="./assets/style.css?version=1000">
    </head>
    <body>
        <!-- MENU !-->
            <div class="ui large top fixed stackable menu">
                <div class="ui container">
                    <a class="item" href="../"><img src="./assets/logo.png"></a>
                    <a class="active item" href="./">
                        Home
                    </a>
                    <a class="item" href="./offerte/">
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
                                            <div class="header">'.$usr["nome"].' '.$usr["cognome"].'</div>
                                            <a class="item" href="./profilo/"><i class="address card icon"></i>Profilo</a>
                                            <a class="item" href="./chat"><i class="comment icon"></i>Chat</a>
                                            <a class="item" href="./php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
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
                <div class="six wide right floated column">
                    <h1 class="ui huge header">
                        Benvenuto in Compleo
                    </h1>
                    <p class="lead">
                        Ogni piccolo lavoro è importante, inizia da qui!
                    </p>
                    <center>
                        <h1 class="ui header">Alcuni consigli per incominciare</h1>
                    </center>
                    <br>
                    <div class="ui centered link cards"> 
                        <a class="card" href="./profilo/registrati.php">
                            <div class="content">
                                <div class="header">Crea il tuo primo account</div>
                                <div class="description">
                                    Lavorare con Compelo è una grandissima opportunità, coglila al balzo registrandoti ora!
                                </div>
                            </div>
                            <div class="extra content">
                                <span>
                                    Diventa parte della nostra famiglia ora.
                                </span>
                            </div>
                        </a>
                        <a class="card" href="./profilo/profilo-opzioni.php">
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
                        <a class="card" href="./profilo/">
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
                        <a class="card" href="./offerte/">
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
                    <br>
                    <center>
                        <h1 class="ui header">
                            Ultime Aggiunte
                        </h1>
                    </center>
                    <br>
                    <div class="ui cards">    
                            <?php
                                if(!isset($allWork['message']))
                                {
                                    for($i = 0; $i < count($allWork); $i++)
                                    {
                                        echo cartaLavoro($allWork[$i]["id"], $allWork[$i]["titolo"], $allWork[$i]["testo"], $allWork[$i]["tipo"] ,$allWork[$i]["idUtente"]);
                                    }
                                }
                            ?>
                    </div>   
                </div>         
            </div>

        </div>


        <div class="ui modal">
            <i class="close icon"></i>
            <div class="header" id="nome">
                ...
            </div>
            <div class="image content">
                <div class="ui medium image">
                    <div>
                        <h2 id="nomeLavoratore">...</h2>
                        <p id="tipo">...</p>
                        
                    </div>
                </div>
                <div class="description">
                    <!--<div class="ui header" id="nome"></div>-->
                    <p id="testo">...</p>
                </div>
            </div>
            <div class="actions">
                <a id="link-profilo" href="#">
                    <div class="ui right labeled icon button">
                        Visita il profilo
                        <i class="user icon"></i>
                    </div>
                </a>
                <div class="ui positive right labeled icon button">
                    Contatta
                    <i class="checkmark icon"></i>
                </div>
                <div class="ui black deny button">
                    Chiudi
                </div>
            </div>
        </div>
        

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="./assets/semantic/semantic.min.js"></script>
        <script>
            function showPopUp(nome, tipo, testo, nomeLavoratore, linkLavoratore)
            {
                document.getElementById('nome').innerHTML = nome;
                document.getElementById('tipo').innerHTML = tipo;
                document.getElementById('testo').innerHTML = testo;
                document.getElementById('nomeLavoratore').innerHTML = nomeLavoratore;
                document.getElementById('link-profilo').setAttribute('href', linkLavoratore);
                //devo settare il link
                $('.ui.modal').modal('show'); 
            }
        </script>
    </body>
</html>