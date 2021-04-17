<?php
    session_start();
    include_once '../php/api/abstract/compleo-api-activity.php';
    include_once '../php/api/abstract/compleo-api-user.php';
    $attivita = listQualifiche();
    $attivitaSelezionata = isset($_GET['attivita']) ? $_GET['attivita'] : ""; //l'indice
    $attivitaSettata = $attivitaSelezionata == "" ? false : true;
    //echo var_dump($attivitaSettata);//false
    $allWork = null;
    if($attivitaSettata && attivitaValida($attivitaSelezionata, $attivita));
    {
        //perchè entra lo stesso
        //echo '<script>alert(\'Sono entrato ziopporco\')</script>';
        if($attivitaSettata)
        {
            $allWork = listLavoriPerQualifica($attivita[$attivitaSelezionata]);
        }
    }
    if(!$attivitaSettata)
    {
        //echo 'attivita settata col culo';
        $allWork = listTuttiILavori();
        //echo var_dump($allWork);
    }
    $allWorkValido = isset($allWork["message"]) || $allWork == NULL ? false : true;
    
    function attivitaValida($selezione, $att) //att is attivita
    {
        if($selezione < 0 || $selezione >= count($att))
            return false;
        return true;
    }

    function cartaLavoro($titolo, $testo, $tipo, $idUtente)
    {
        $user = getUserByID($idUtente);
        $nomeUtente = $tipo. ", " .$user["nome"] . " " . $user["cognome"];
        //per il botton contatta useremo l'idUtente
        return '
        <div class="ui cards">
  <div class="card">
    <div class="content">
      <div class="header">
        '.$titolo.'
      </div>
      <div class="meta">
        '.$nomeUtente.'
      </div>
      <div class="description">
        '.$testo.'
      </div>
    </div>
    <div class="extra content">
      <div class="ui two buttons" style="item-align:left">
        <!--<div class="ui basic green button">Contatta</div>-->
        <!--<div class="ui basic red button">Decline</div>-->
        <button class="ui primary button">Contatta</button>
      </div>
    </div>
  </div>
  
</div>';
    }
?>

<html lang="it">
    <head>
        <title>Compleo - WebApp</title>

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
                            if($attivitaSelezionata == "")
                            {
                                //nessuna attività selezionata
                                echo '<option value="">seleziona attività</option>';
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
                                    echo '<option value="">tutte le attività</option>';
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
                        <?php 
                            if($allWorkValido)
                            {
                                
                                for($i = 0; $i < count($allWork); $i += 1)
                                {
                                    //echo var_dump($allWork[$i]);
                                    //echo var_dump($allWork[$i]["titolo"]);
                                    echo cartaLavoro($allWork[$i]["titolo"], $allWork[$i]["testo"], $allWork[$i]["tipo"] ,$allWork[$i]["idUtente"]);
                                }
                            }
                            else
                            {
                                echo 'Nessun lavoro ricopre le caratteristiche richieste';
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
        <script src="../assets/semantic/semantic.min.js"></script>
        <script>
            function selezionaAttivitaChange(value)
            {
                location.replace("index.php?attivita=" + value,)
            }
        </script>
    </body>
</html>