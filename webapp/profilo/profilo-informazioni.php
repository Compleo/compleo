<?php
    session_start();
?>

<html lang="it">
    <head>
        <title>Compleo - Profilo</title>

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
                    <a class="item">
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
                                        '.$usr["nome"].' '.$usr["cognome"].'
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <a class="active item" href="./">Profilo</a>
                                            <a class="item" href="../php/logout.php">Esci</a>
                                        </div>
                                    </div>   
                                ';
                            } else {
                                header("location: ../");
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
                                echo $usr["nome"].' '.$usr["cognome"];
                            ?>
                        </h1>
                        <p class="lead">
                            <?php
                                echo $usr["email"];
                            ?>
                        </p>
                        <p class="lead">
                            Account di livello [LIVELLO]
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
                    <a class="item" href="./">Lavori</a>
                    <a class="active item" href="./profilo-informazioni.php">Informazioni</a>
                    <a class="item" href="./profilo-opzioni.php">Opzioni</a>
                </div>
                <table class="ui celled table">
                    <thead>
                        <tr><th>Nome</th>
                        <th>Cognome</th>
                        <th>Nome Utente</th>
                        <th>Codice Fiscale</th>
                        <th>Numero di Telefono</th>
                        <th>Indirizzo</th>
                    </tr></thead>
                    <tbody>
                        <tr>
                            <td data-label="Nome"><?php echo $usr["nome"]?></td>
                            <td data-label="Cognome"><?php echo $usr["cognome"]?></td>
                            <td data-label="Nome Utente"><?php echo $usr["username"]?></td>
                            <td data-label="Codice Fiscale"><?php echo $usr["cf"]?></td>
                            <td data-label="Numero di Telefono"><?php echo $usr["telefono"]?></td>
                            <td data-label="Indirizzo"><?php echo $usr["citta"]["nome"].', '.$usr["indirizzo"].' ('.$usr["citta"]["regione"].', '.$usr["citta"]["provincia"].')'; ?></td>
                        </tr>
                    </tbody>
                </table> <br>
                (Le seguenti informazioni possono essere modifate, ove possibile, nella sezione Opzioni)
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