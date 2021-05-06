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


include_once("../php/api/abstract/compleo-api-activity.php");
include_once('../php/api/abstract/compleo-api-user.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $infoLavoro = getLavoroPerID($id);
    $qualifiche = listQualifiche();
} else {
    header("location: ../");
}
?>

<html lang="it">

<head>
    <title>Compleo - Modifica Lavoro</title>

    <!-- MetaTags (Google e simili) -->
    <meta name="title" content="Compleo - Offerte">
    <meta name="description" content="Modifica un'offerta">  
    <meta name='viewport' content='width=device-width, initial-scale=1' />

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
                <h2>
                    Modifica Lavoro
                </h2>
                <form class="ui form" method="POST" action="../php/processa-modifica-lavoro.php?id=<?php echo $_GET["id"]; ?>">
                    <div class="field">
                        <label>Titolo Lavoro</label>
                        <?php echo '<input type="text" name="titolo" value="' . $infoLavoro['titolo'] . '">'; ?>
                    </div>
                    <div class="field">
                        <div class="ui selection dropdown select-tipo">
                            <input type="hidden" name="tipo">
                            <i class="dropdown icon"></i>
                            <?php echo '<div class="default text" data-value="'.$infoLavoro["tipo"].'">'.$infoLavoro["tipo"].'</div>';?>                       
                            <div class="menu">                           
                            <?php
                                foreach($qualifiche as $lavoro)
                                {
                                    echo '<div class="item" data-value="'.$lavoro.'">'.$lavoro.'</div>';
                                }                              
                            ?>   
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Testo Lavoro</label>
                        <?php echo '<textarea id="testo" name="testo" rows="4" cols="50">' . $infoLavoro['testo'] . '</textarea>'; ?>
                    </div>
                    <button class="ui button" type="submit">Modifica</button>
                </form>

            </div>
        </div>

    </div>

    <!-- JS !-->
    <script type="text/javascript">window.onload = function() { $('.ui.dropdown').dropdown(); };</script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../assets/semantic/semantic.min.js"></script>
</body>

</html>