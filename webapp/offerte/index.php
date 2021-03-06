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
        $disabled = false;

        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {

            $usr = $_SESSION['datiUtente'];
            if($usr["username"] == $usrName) {
                $bC = '<a class="ui disabled header" href="./prenotazioni/nuova.php?idLav='.$idLav.'&idUtente='.$idUtente.'"><button class="ui disabled button" style="margin-right: 10px;">Contatta</button></a>';
                $disabled = true;
            }
            else{
                $bC = '<a class="ui header" href="./prenotazioni/nuova.php?idLav='.$idLav.'&idUtente='.$idUtente.'"><button class="ui button" style="margin-right: 10px;">Contatta</button></a>';   
            }
        } else {
            $bC = '<a  class="ui header" href="../profilo"><button class="ui button" style="margin-right: 10px;">Contatta</button></a>';
        }

        //per il botton contatta useremo l'idUtente
        return '
        <div class="column col-md-4" style="padding-bottom:15px">
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
                        <button class="ui button"  tabindex="1" onclick="showPopUp(\''.$titolo.'\', \''.$tipo.'\', \''.$testo.'\', \''.$nomeUtente.'\', \'../profilo/esplora/?usr='.$usrName.'\', '. $disabled .')">Visualizza</button>
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
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/style.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-grid.min.css">
        <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../assets/css/style.css" rel="stylesheet">
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
                                //nessuna attivit?? selezionata
                                echo '<option value="">Seleziona Attivit??</option>';
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
                                    echo '<option value="">Tutte le Attivit??</option>';
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
                        <div class="ui cards row">
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
        <div class="modal" tabindex="-1" id="modal-lavori">
            <div class="modal-dialog modal-dialog-centered" >
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nome">...</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="modal-close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <h2 id="nomeLavoratore">...</h2>
                            <p id="tipo">...</p>
                                    
                        </div>
                        <p id="testo">...</p>
                    </div>
                    <div class="modal-footer">
                        <a id="link-profilo" href="#">
                            <div class="ui right labeled icon button">
                                Visita il profilo
                                <i class="user icon"></i>
                            </div>
                        </a>
                        <div class="ui positive right labeled icon button" id="btncontatta">
                            Contatta
                            <i class="checkmark icon"></i>
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
        <script sr="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script>
            $( "#modal-close" ).click(function() {
                $('#modal-lavori').modal('hide');
            });

            $( "#close" ).click(function() {
                $('#messaggio').hide();
            });

            function showPopUp(nome, tipo, testo, nomeLavoratore, linkLavoratore, disable)
            {
                //showPopUp('lavoro', 'cameriere','dammi lavoro' ,'mattia', 'www.google.com', true)
                document.getElementById('nome').innerHTML = nome;
                document.getElementById('tipo').innerHTML = tipo;
                document.getElementById('testo').innerHTML = testo;
                document.getElementById('nomeLavoratore').innerHTML = nomeLavoratore;
                document.getElementById('link-profilo').setAttribute('href', linkLavoratore);
                
                if(disable)
                {
                    document.getElementById("btncontatta").classList.add('disabled');
                }

                $('#modal-lavori').modal('show');
            }

            function selezionaAttivitaChange(value)
            {
                location.replace("index.php?attivita=" + value,)
            }
        </script>
        
    </body>
</html>