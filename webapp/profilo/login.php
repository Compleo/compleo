<?php
    session_start();

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("location: ./");
    }
?>

<html lang="it">
    <head>
        <title>Compleo - Login</title>

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/loginStyle.css">
    </head>
    <body>
        <!-- MENU !-->
            <div class="ui large top fixed stackable menu">
                <div class="ui container">
                    <a class="item" href="../../"><img src="../assets/logo.png"></a>
                    <a class="item" href="../">
                        Home
                    </a>
                    <a class="item">
                        Offerte
                    </a>
                </div>
            </div>

            <div class="ui middle aligned grid child">
                <div class="column">
                    <div class="ui center aligned page grid">
                        <form class="ui form" method="POST" action="../php/login_verifica.php">
                            <div class="field">
                                <label>Username</label>
                                <input type="text" name="username" id="username" placeholder="Username">
                            </div>
                            <div class="field">
                                <label>Password</label>
                                <input type="password" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="field">
                                <div class="ui checkbox">
                                <input type="checkbox" tabindex="0" class="hidden">
                                <label>Ricordami</label>
                                </div>
                            </div>
                            <?php 
                                if(isset($_SESSION['errore'])) {
                                    echo '
                                        <div class="ui negative message">
                                        <i class="close icon"></i>
                                        <div class="header">
                                            Errore
                                        </div>
                                        <p>'.$_SESSION['errore'].'
                                        </p></div>
                                    ';
                                }
                            ?>
                            <button class="ui button" type="submit">Accedi</button> Non sei registrato? Clicca <a href="./registrati.php">qui</a>
                        </form>
                    </div>
                </div>
            </div>


        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../assets/semantic/semantic.min.js"></script>
    </body>
</html>