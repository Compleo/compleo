<?php

session_start();

include("../../php/api/abstract/compleo-api-activity.php");
include("../../php/api/abstract/compleo-api-user.php");

if (isset($_GET["idRecensire"]) && isset($_GET["idRichiestaLavoro"])) {
    $idRecensire = $_GET["idRecensire"];
    $idRichiestaLavoro = $_GET["idRichiestaLavoro"];

    //Prendo info utente
    $utenteRecensito = getUserByID($idRecensire);
    $utenteRecensore = getUserByID($idRichiestaLavoro);

} else {
    //header("location: ../../");
    $utenteRecensito = getUserByID(1);
    $utenteRecensore = getUserByID(60);
}

?>

<html lang="it">

<head>
    <title>Compleo - Nuova Recensione</title>

    <meta name='viewport' content='width=device-width, initial-scale=1' />

    <!-- CSS !-->
    <link rel="stylesheet" type="text/css" href="../../assets/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css">
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
                                            <div class="header">' . $usr["nome"] . ' ' . $usr["cognome"] . '</div>
                                            <a class="item" href="../../profilo"><i class="address card icon"></i>Profilo</a>
                                            <a class="active item" href="../../offerte/prenotazioni"><i class="money bill alternate icon"></i>Prenotazioni</a>
                                            <a class="item" href="../../chat"><i class="comment icon"></i>Chat</a>
                                            <a class="item" href="../../php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
                                        </div>
                                    </div>   
                                ';
                } else {
                    echo '
                                    <a class="item" href="../../profilo/login.php">
                                        Login | Registrati
                                    </a>   
                                ';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="ui stackable container" style="padding-top:5%;">
        <form class="ui form">

        <div class="two fields">           
                <div class="field">
                    <label>Recensito</label>            
                    <input type="text" name="recensito" value="<?php echo $utenteRecensito['username'];?>" id=recensito readonly >
                </div>
                
                
                <div class="field">
                    <label>Recensore</label>
                    <input type="text" name="recensore" value="<?php echo $utenteRecensore['username'];?>" id=recensore readonly >
                </div>
            </div>

            <div class="two fields">
                
            
                <div class="field">
                    <label>Titolo Recensione</label>            
                    <input type="text" name="titolo" placeholder="titolo" id=titolo>
                </div>
                
                
                <div class="field">
                    <label>Voto</label>
                    <select class="ui fluid search dropdown" name="voto" id="voto">
                        <option value="">voto</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>

                    </select>
                </div>
            </div>



            <div class="field">
                <label>Recensione</label>
                <textarea placeholder="testo recensione" name="testo" id="testo"></textarea>
            </div>

            <button class="ui blue button" type="submit">Conferma</button>

        </form>
    </div>




    <!-- JS !-->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../../assets/semantic/semantic.min.js"></script>
    <script>
        window.onload = function() {
            $('.ui.dropdown').dropdown();
        };
    </script>
</body>

</html>