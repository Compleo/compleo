<?php
    session_start();

    /*
        ***************************************
                Compleo Source Code             
        ***************************************
        Programmer: Leonardo Baldazzi   (git -> @squirlyfoxy)
                                        (instagram -> @leonardobaldazzi_)

        Programmer: Mattia Senni        (git -> @mtttia)
        
        programmer: tommaso brandinelli (git -> @MayonaiseMan)

        Il seguente codice gestisce la reicerca delle offerte

        THE FOLLOWING SOURCE CODE IS CLOSED SOURCE, COPYRIGHT (C) 2021 - COMPLEO
    */

    include_once '../php/api/abstract/compleo-api-activity.php';
    include_once '../php/api/abstract/compleo-api-user.php';
    
    $attivita = listQualifiche();
    $attivitaSelezionata = isset($_GET['attivita']) ? $_GET['attivita'] : ""; //l'indice
    $attivitaSettata = $attivitaSelezionata == "" ? false : true;

    $allWork = null;

    if($attivitaSettata && attivitaValida($attivitaSelezionata, $attivita));
    {
        if($attivitaSettata)
        {
            $allWork = listLavoriPerQualifica($attivita[$attivitaSelezionata]);
        }
    }
    if(!$attivitaSettata)
    {
        $allWork = listTuttiILavori();
    }
    $allWorkValido = isset($allWork["message"]) || $allWork == NULL ? false : true;
    
    function attivitaValida($selezione, $att) //att is attivita
    {
        if($selezione < 0 || $selezione >= count($att))
            return false;
        return true;
    }

    function cartaLavoro($idLav, $titolo, $testo, $tipo, $idUtente)
    {
        $user = getUserByID($idUtente);
        $nomeUtente = $user["nome"] . " " . $user["cognome"];
        $usrName = strtolower($user["nome"].'.'.$user["cognome"]);
        $disable = '';

        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $usr = $_SESSION['datiUtente'];
            if($usr["username"] == $usrName) {
                //$bC = '<button class="ui disabled button" style="margin-right: 10px;">Contatta</button>';
                $disable = 'disabled';
            }
            else{
                //$bC = '<button class="ui button" style="margin-right: 10px;">Contatta</button>';    
                $disable = '';
            }
        } else {
            //$bC = '<button class="ui button" style="margin-right: 10px;">Contatta</button>';
            $disable = '';
        }

        $bC = '<button class="ui button '.$disable.'" style="margin-right: 10px;">Contatta</button>';

        //per il botton contatta useremo l'idUtente
        return '
        <div class="column">
            <div class="ui fluid card">
                <div class="content">
                <div class="header">
                    '.$titolo.'
                </div>
                <div class="meta">
                    '.$tipo. ', <a class="header" href="../profilo/esplora/?usr='.$usrName.'"">' .$nomeUtente.'</a>
                </div>
                <div class="description">
                    '.$testo.'
                </div>
                </div>
                <div class="extra content">
                    <div class="ui two buttons" >
                        '.$bC.'
                        <button class="ui button"  tabindex="1" onclick="showPopUp(\''.$titolo.'\', \''.$tipo.'\', \''.$testo.'\', \''.$nomeUtente.'\', \'../profilo/esplora/?usr='.$usrName.'\')">Visualizza</button>
                    </div>
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

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/style.css">
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
                                            <a class="item" href="../profilo/"><i class="address card icon"></i>Profilo</a>
                                            <a class="item" href="../chat"><i class="comment icon"></i>Chat</a>
                                            <a class="item" href="../php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
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
                    <h2>
                    <?php
                        if($attivitaSettata)
                        {
                            if(attivitaValida($attivitaSelezionata, $attivita))
                            {
                                echo $attivita[$attivitaSelezionata];       
                            }
                        }
                        else
                            echo 'Tutti i lavori';
                    ?>
                    </h2>
                    
                    <select class="ui search dropdown" id="selezionaAttivita" onchange="selezionaAttivitaChange(value)">
                        <?php 
                            //TODO: GRAFICA MIGLIORE
                            if($attivitaSelezionata == "")
                            {
                                //nessuna attività selezionata
                                echo '<option value="">Seleziona Attività</option>';
                                for($i = 0; $i < count($attivita); $i += 1)
                                {
                                    echo '<option value="'.$i.'">'.$attivita[$i].'</option>';
                                }
                            }
                            else
                            {
                                if($attivitaSelezionata < 0 || $attivitaSelezionata >= count($attivita))
                                {
                                    header("Location:./index.php");//elimino i get
                                }
                                else
                                {
                                    echo '<option value="'.$attivitaSelezionata.'">'.$attivita[$attivitaSelezionata].'</option>';
                                    echo '<option value="">Tutte le Attività</option>';
                                    for($i = 0; $i < count($attivita); $i += 1)
                                    {
                                        if($i != $attivitaSelezionata)
                                            echo '<option value="'.$i.'">'.$attivita[$i].'</option>';
                                    }
                                }
                            }
                            
                        ?>
                    </select>
                    <div style="margin-top: 20px;">
                        <div class="ui three column grid">
                        <?php 
                            if($allWorkValido)
                            {
                                
                                for($i = 0; $i < count($allWork); $i += 1)
                                {
                                    //echo var_dump($allWork[$i]);
                                    //echo var_dump($allWork[$i]["titolo"]);
                                    echo cartaLavoro($allWork[$i]["id"], $allWork[$i]["titolo"], $allWork[$i]["testo"], $allWork[$i]["tipo"] ,$allWork[$i]["idUtente"]);
                                }
                            }
                            else
                            {
                                echo '<p class="lead">Nessun lavoro ricopre le caratteristiche richieste</p>';
                            }
                        ?>
                        </div>
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
                    <a class="ui button" id="link-profilo" href="#">visita il profilo</a>
                </div>
            </div>
            <div class="description">
            <!--<div class="ui header" id="nome"></div>-->
            <p id="tipo">...</p>
            <p id="testo">...</p>
            </div>
        </div>
        <div class="actions">
            <div class="ui black deny button">
            Chiudi
            </div>
            <div class="ui positive right labeled icon button">
            Contatta
            <i class="checkmark icon"></i>
            </div>
        </div>
        </div>
        

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../assets/semantic/semantic.min.js"></script>
        <script>
            function selezionaAttivitaChange(value)
            {
                location.replace("index.php?attivita=" + value,)
            }
        </script>
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