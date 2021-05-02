<?php
session_start();
?>

<html lang="it">

<head>
    <title>Compleo - Profilo</title>

    <!-- MetaTags (Google e simili) -->
    <meta name="title" content="Compleo - Profilo">
    <meta name="description" content="Il tuo profilo su Compleo">  
    <meta name='viewport' content='width=device-width, initial-scale=1' />

    <!-- CSS !-->
    <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/style.css?version=-1">
</head>

<body>
    <!-- MENU !-->
    <div class="ui large top fixed stackable menu">
        <div class="ui container">
            <a class="item" href="../.."><img src="../assets/logo.png"></a>
            <a class="item" href="../">
                Home
            </a>
            <a class="item" href="../offerte/">
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
                                        <a class="item" href="."><i class="address card icon"></i>Profilo</a>
                                        <a class="item" href="../chat"><i class="comment icon"></i>Chat</a>
                                        <a class="item" href="../php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
                                    </div>
                                </div>        
                                ';
                } else {
                    header("location: ./login.php");
                }
                ?>
            </div>
        </div>
    </div>

    <div class="ui stackable container">
        <div class="ui message">
            <div class="six wide right floated column">
                <img class="usrImage" src="../assets/user.png">
                <div class="userInfo">
                    <h1 class="ui huge header">
                        <?php
                        echo $usr["nome"] . ' ' . $usr["cognome"];
                        ?>
                    </h1>
                    <p class="lead">
                        <?php
                        echo $usr["email"];
                        ?>
                    </p>
                    <p class="lead">
                        Account di livello <b><?php echo $usr["livello"]; ?></b>
                    </p>
                </div>
                <hr>
                <div class="usrBio">
                    <?php
                    echo $usr["bio"];
                    ?>
                </div>
            </div>
            <div class="ui three item menu">
                <a class="item" href="./">Lavori e Recensioni</a>
                <a class="item" href="./profilo-informazioni.php">Informazioni</a>
                <a class="active item" href="./profilo-opzioni.php">Opzioni</a>
            </div>

            <div class="ui grid">
                <div class="four wide column">
                    <div class="ui vertical fluid tabular menu">
                        <a class="item" href="./profilo-opzioni.php">
                            Account
                        </a>
                        <a class="item" href="./profilo-opzioni-fatturazione.php">
                            Fatturazione
                        </a>
                        <a class="active item" href="./profilo-opzioni-chat.php">
                            Chat
                        </a>
                    </div>
                </div>
                <div class="twelve wide stretched column">
                    <div class="ui segment">
                        <div class="ui two item menu">
                            <a class="item" href="./profilo-opzioni-chat.php">Chat</a>
                            <a class="active item" href="./profilo-opzioni-contatta.php">Contatta l'assistenza</a>
                        </div>
                        <form class="ui form" method="POST" action="../php/contatta_staff.php">
                            <div class="field">
                                <label>Messaggio</label>
                                <textarea id="messaggio_staff" placeholder="il contatto da questa zona è solo per messaggi inerenti a problemi col profilo, eventuali domande sul sito saranno ignorate"></textarea>
                            </div>                           
                            <button class="ui button" type="submit">Contatta</button>
                            <p>le risposte saranno effettuate nell'arco di 24/48 ore</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS !-->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../assets/semantic/semantic.min.js"></script>
    <script>
        $('.ui .item').on('click', function() {
            $('.ui .item').removeClass('active');
            $(this).addClass('active');
        });
    </script>
</body>

</html>