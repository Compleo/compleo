<?php
    session_start();
    
    include_once './php/api/abstract/compleo-api-activity.php';
    include_once './php/api/abstract/compleo-api-user.php';
    $allWork = listTuttiILavori();
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
            $bC = '<button class="ui button" style="margin-right: 10px;">Contatta</button>';
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
                    '.$tipo. ', <a href="../profilo/esplora/?usr='.$usrName.'"">' .$nomeUtente.'</a>
                </div>
                <div class="description">
                    '.$testo.'
                </div>
                </div>
                <div class="extra content">
                    <div class="ui two buttons" >
                        '.$bC.'
                        <a class="header" href="./offerte/esplora/?id='.$idLav.'"><button class="ui button"  tabindex="1">Visualizza</button></a>
                    </div>
                </div>
            </div>
            
        </div>';
    }

    if(isset($_COOKIE['cuser']) && isset($_COOKIE['cpass']))
        {
            try
            {
                $response = getUserByUsernameAndPassword($_COOKIE['cuser'], $_COOKIE['cpass']);
                if(isset($response["message"]) && $response["message"] == "userNotFound")
                {
                $_SESSION['errore'] = "Account e/o password non corrispondono...";      
                header('Location: ..\index.php');
                } else {
                $_SESSION['datiUtente'] = $response;

                $_SESSION['login'] = true;

                $_SESSION['errore'] = "";
                header('Location: ..\index.php');
                }
            }catch(Exception $ex)
            {
                throw new Exception($ex->getMessage(), (int)$ex->getCode());
            }
        }
?>

<html lang="it">
    <head>
        <title>Compleo - WebApp</title>

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
                <!--
                <div class="six wide right floated column homeImg">
                </div>
                <div class="imgText">
                    <h1 class="ui huge header">
                        Benvenuto in Compleo
                    </h1>
                    <p class="lead">
                        Piccoli servizi, al Completo.
                    </p>
                </div> !-->
                <h2>
                    Ultime Aggiunte
                </h2>
                    <div class="ui three column grid">
                        
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

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="./assets/semantic/semantic.min.js"></script>
    </body>
</html>