<?php
    session_start();

    include_once("../php/api/abstract/compleo-api-recensioni.php");
    include_once("../php/api/abstract/compleo-api-user.php");

    if(!isset($_SESSION['login'])) {
        header('Location: ./login.php');
    }
?>

<html lang="it">
    <head>
        <title>Compleo - Profilo</title>

        <!-- MetaTags (Google e simili) -->
        <meta name="title" content="Compleo - Profilo">
        <meta name="description" content="Il tuo profilo su Compleo">  
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.7/dist/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/style.css?version=-1">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-grid.min.css">
        <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php include_once('navbar.php'); ?>
        
        <div class="ui stackable container">
            <div class="ui message">
                <div class="six wide right floated column">
                <?php 
                    if($usr['sesso']=='Uomo')
                    {
                        echo '<img class="usrImage" src="../assets/user-uomo.png">';
                    }
                    elseif($usr['sesso'] == 'Donna')
                    {
                        echo '<img class="usrImage" src="../assets/user-donna.png">';
                    }elseif($usr['sesso'] == 'Altro')
                    {
                        echo '<img class="usrImage" src="../assets/user.png">';
                    }
                    else
                    {
                        echo '<img class="usrImage" src="../assets/user.png">';
                    }
                ?>
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
                <center>
                    <h2 class="ui header">Recensioni</h1>
                </center>
                <h4 class="ui dividing header">Parlano di me:</h2> <br>
                <div class="ui items">
                    <?php
                    if(isset($rispRecRecensioni)) {
                        for($i = 0; $i < count($rispRecRecensioni); $i++) {
                            $u = getUserByID($rispRecRecensioni[$i]->idRecensore);
                            $usrNome = $u["nome"];
                            $usrCognome = $u["cognome"];
                            $usrName = strtolower($usrNome.'.'.$usrCognome);

                            echo '
                            <div class="item">
                                <div class="ui tiny image">
                                    <a class="header" href="../offerte/recensione/esplora.php?id='.$rispRecRecensioni[$i]->id.'">
                                        <img src="../assets/img/voti/'.$rispRecRecensioni[$i]->valore.'.png">
                                    </a>
                                </div>
                                <div class="content">
                                    <a class="header" href="./esplora/?usr='.$usrName.'">'.$usrNome.' '.$usrCognome.'</a>
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
                    } else {
                        echo '<p class="lead">
                            Nessuno mi ha recensito
                        </p>';
                    }
                    ?>
                </div>
                <h4 class="ui dividing header">Le mie recensioni: </h2> <br>
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
                                $u = getUserByID($rispRecRecensioni[$i]->idRecensore);
                                $usrNome = $u["nome"];
                                $usrCognome = $u["cognome"];
                                $usrName = strtolower($usrNome.'.'.$usrCognome);

                                echo '
                                <div class="item">
                                    <div class="ui tiny image">
                                        <a class="header" href="../offerte/recensione/esplora.php?id='.$rispRedRecensioni[$i]->id.'">
                                            <img src="../assets/img/voti/'.$rispRedRecensioni[$i]->valore.'.png">
                                        </a>
                                    </div>
                                    <div class="content">
                                    <a class="header" href="./esplora/?usr='.$usrName.'">'.$usrNome.' '.$usrCognome.'</a>
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
                <?php
                    if($usr["livello"] == "Completo") {
                        include("./components/components-lavori.php");
                    }
                ?>
            </div>
        </div>

        <?php include_once('footer.php'); ?>

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.7/dist/semantic.min.js"></script>       
        <script type="text/javascript" src="./components/js/components-lavori-addFascia.js"></script> 
        <script type="text/javascript">
            window.onload = function() {
                $('.ui.dropdown').dropdown();
            };
        </script>
    </body>
</html>
