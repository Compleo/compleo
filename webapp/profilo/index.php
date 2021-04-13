<?php
    session_start();

    include_once("../php/api/abstract/compleo-api-recensioni.php");
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
                                        <div class="header">'.$usr["nome"].' '.$usr["cognome"].'</div>
                                        <a class="item" href="."><i class="address card icon"></i>Profilo</a>
                                        <a class="item" href="../chat"><i class="comment icon"></i>Chat</a>
                                        <a class="item" href="../php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
                                    </div>
                                </div>   
                                ';
                            } else {
                                header("location: ../");
                            }

                            $rispRecRecensioni = listAllRecensioniByIDRecensito($usr["id"]);
                            $rispRedRecensioni = listAllRecensioniByIDRecensore($usr["id"]);
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
                    <a class="active item" href="./">Lavori e Recensioni</a>
                    <a class="item" href="./profilo-informazioni.php">Informazioni</a>
                    <a class="item" href="./profilo-opzioni.php">Opzioni</a>
                </div>
                <h1 class="ui header">Parlano di me:</h1>
                <div class="ui items">
                    <?php
                        for($i = 0; $i < count($rispRecRecensioni); $i++) {
                            echo '
                            <div class="item">
                                <div class="ui tiny image">
                                    <img src="../assets/img/voti/'.$rispRecRecensioni[$i]->valore.'.png">
                                </div>
                                <div class="content">
                                    <a class="header">NOME UTENTE</a>
                                    <div class="meta">
                                        <span>'.$rispRecRecensioni[$i]->titolo.'</span>
                                    </div>
                                    <div class="extra">
                                        '.$rispRecRecensioni[$i]->testo.'
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    ?>
                </div>
                <div class="ui clearing divider"></div>
                <h1 class="ui header">Le mie recensioni: </h1>
                <?php
                    if (!isset($rispRedRecensioni[0]->titolo)) {
                        echo '
                        <p class="lead">
                            Non ho fatto ancora nessuna recensione
                        </p>
                        ';
                    } else { ?>
                        <div class="ui items">
                        <?php
                            for($i = 0; $i < count($rispRedRecensioni); $i++) {
                                echo '
                                <div class="item">
                                    <div class="ui tiny image">
                                        <img src="../assets/img/voti/'.$rispRedRecensioni[$i]->valore.'.png">
                                    </div>
                                    <div class="content">
                                        <a class="header">NOME UTENTE</a>
                                        <div class="meta">
                                            <span>'.$rispRedRecensioni[$i]->titolo.'</span>
                                        </div>
                                        <div class="extra">
                                            '.$rispRedRecensioni[$i]->testo.'
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                        ?>
                        </div> <?php
                    }
                ?>

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