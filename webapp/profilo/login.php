<?php
    session_start();

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("location: ./");
    }
?>

<html lang="it">
    <head>
        <title>Compleo - Login</title>

        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/loginStyle.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-grid.min.css">
        <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- MENU !-->
            <?php include_once('navbar.php'); ?>

            <div style="margin-top:200px;">
            <div class="ui middle aligned grid child">
                <div class="column">
                    <div class="ui center aligned page grid">
                        <form class="ui form" method="POST" action="../php/login_verifica.php">
                            <div class="field">
                                <label>Username</label>
                                <div class="ui left icon input">
                                    <i class="user icon"></i>
                                    <input type="text" name="username" id="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="field">
                                <label>Password</label>
                                <div class="ui left icon input">
                                    <i class="lock icon"></i>
                                    <input type="password" name="password" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="field" id="check-remember">
                                <div class="ui checkbox">
                                    <input type="checkbox" tabindex="0" class="hidden" id="remember">
                                    <?php if(isset($_COOKIE["member_login"])) { ?> checked
                                    <?php } ?> <label for="remember-me">Ricordami</label>
                                </div>
                            </div>
                            <?php 
                                if(isset($_SESSION['errore']) && $_SESSION['errore'] != "") {
                                    echo '
                                        <div class="ui negative message">
                                            <i class="close icon"></i>
                                            <div class="header">
                                                Errore
                                            </div>
                                            <p>'.$_SESSION['errore'].'
                                            </p>
                                        </div>
                                    ';
                                }
                            ?>
                            <button class="ui button" type="submit">Accedi</button> Non sei registrato? Clicca <a href="./registrati.php">qui</a>
                        </form>
                    </div>
                </div>
            </div>
            </div>

            <?php include_once('footer.php'); ?>

        <!-- JS !-->
        <script type="text/javascript">window.onload = function() {$('.ui.checkbox').checkbox();};</script>
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../assets/semantic/semantic.min.js"></script>
    </body>
</html>