<?php
session_start();

/*
        ***************************************
                Compleo Source Code             
        ***************************************
        Programmer: Leonardo Baldazzi   (git -> @squirlyfoxy)
                                        (instagram -> @leonardobaldazzi_)

        Programmer: Mattia Senni        (git -> @mtttia)

        Il seguente codice gestisce la reicerca delle offerte

        THE FOLLOWING SOURCE CODE IS CLOSED SOURCE, COPYRIGHT (C) 2021 - COMPLEO
    */

include_once '../php/api/abstract/compleo-api-activity.php';
include_once '../php/api/abstract/compleo-api-user.php';

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $infoLavoro = getLavoroPerID($id);
    }
?>

<html lang="it">

<head>
    <title>Compleo - Offerte</title>

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
                                            <div class="header">' . $usr["nome"] . ' ' . $usr["cognome"] . '</div>
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
                <?php
                

                echo '
                    <form class="ui form">
                        <div class="field">
                            <label>Titolo Lavoro</label>
                            <input type="text" name="first-name" placeholder="'.$infoLavoro['titolo'].'">
                        </div>
                        <div class="field">
                            <label>Tipo Lavoro</label>
                            <input type="text" name="last-name" placeholder="'.$infoLavoro['tipo'].'">
                        </div>
                        <div class="field">
                            <label>Testo Lavoro</label>
                            <textarea id="bio" name="bio" rows="4" cols="50">'.$infoLavoro['testo'].'</textarea>
                        </div>                        
                        <button class="ui button" type="submit">Modifica</button>
                    </form>'
                
                ?>

            </div>
        </div>

    </div>

    <!-- JS !-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../assets/semantic/semantic.min.js"></script>
    <script>
        function selezionaAttivitaChange(value) {
            location.replace("index.php?attivita=" + value, )
        }
    </script>
</body>

</html>