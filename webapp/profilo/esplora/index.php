<?php
    session_start();

    include_once("../../php/api/abstract/compleo-api-user.php");
    include_once("../../php/api/abstract/compleo-api-recensioni.php");

    if(isset($_GET["usr"]) && $_GET["usr"] != "") {
        $userToSearch = $_GET["usr"];

        $response = getUserByUsername($userToSearch);

        if(isset($response["message"]) && $response["message"] == "error") {
            echo '
                <script>
                    console.log("Username non trovato");
                </script>
            ';
            header("location: ../../");
        }
    }

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        $usr = $_SESSION['datiUtente'];

        if ($usr["username"] == $userToSearch) {
            header("location: ../");
        }
    }

    $recensioniMie = listAllRecensioniByIDRecensito($response["id"]);
    $recensioniLoro = listAllRecensioniByIDRecensore($response["id"]);
?>

<html lang="it">
    <head>
        <title>Compleo - Profilo</title>

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../../assets/style.css?version=-1">
    </head>
    <body>
               <!-- MENU !-->
               <div class="ui large top fixed stackable menu">
                <div class="ui container">
                    <a class="item" href="../../.."><img src="../../assets/logo.png"></a>
                    <a class="item" href="../../">
                        Home
                    </a>
                    <a class="item" href="../../offerte/">
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
                                        <a class="item" href="../"><i class="address card icon"></i>Profilo</a>
                                        <a class="item" href="../../chat"><i class="comment icon"></i>Chat</a>
                                        <a class="item" href="../../php/logout.php"><i class="sign out alternate icon"></i>Esci</a>
                                    </div>
                                </div>     
                                ';
                            } else {
                                echo '
                                    <a class="item" href="../login.php">
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
                    <img class="usrImage" src="../../assets/user.png">
                    <div class="userInfo">
                        <h1 class="ui huge header">
                            <?php
                                echo $response["nome"].' '.$response["cognome"];
                            ?>
                        </h1>
                        <p class="lead">
                            <?php
                                echo $response["email"];
                            ?>
                        </p>
                        <p class="lead">
                            Account di livello <b><?php echo $response["livello"]; ?></b>
                        </p>
                    </div>
                    <hr>
                    <div class="usrBio">
                        <?php
                            echo $response["bio"];
                        ?>
                    </div>
                </div>
                <div class="ui two item menu">
                    <a class="active item" href="./?usr=<?php echo $userToSearch; ?>">Lavori e Recensioni</a>
                    <a class="item" href="./profilo-informazioni.php?usr=<?php echo $userToSearch; ?>">Informazioni</a>
                </div> <br>
                <center>
                    <h2 class="ui header">Recensioni</h1>
                </center> <br>
                <h4 class="ui dividing header">Parlano di me:</h2> <br>
                <div class="ui items">
                    <?php
                    if (isset($recensioniMie[0]->titolo)) {
                        for($i = 0; $i < count($recensioniMie); $i++) {
                            $u = getUserByID($recensioniMie[$i]->idRecensore);
                            $usrNome = $u["nome"];
                            $usrCognome = $u["cognome"];
                            $usrName = strtolower($usrNome.'.'.$usrCognome);

                            echo '
                            <div class="item">
                                <div class="ui tiny image">
                                    <a class="header" href="../../offerte/recensione/esplora.php?id='.$recensioniMie[$i]->id.'">
                                        <img src="../../assets/img/voti/'.$recensioniMie[$i]->valore.'.png">
                                    </a>
                                </div>
                                <div class="content">
                                    <a class="header" href="./?usr='.$usrName.'">'.$usrNome.' '.$usrCognome.'</a>
                                    <div class="meta">
                                        <span>'.$recensioniMie[$i]->titolo.'</span>
                                    </div>
                                    <div class="extra">
                                        '.$recensioniMie[$i]->testo.'
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    } else {
                        echo '
                            <p class="lead">
                                Quest'."'".'account non ha ancora nessuna recensione
                            </p>
                        ';
                    }
                        
                    ?>
                </div>
                <div class="ui clearing divider"></div> <br>
                <h4 class="ui dividing header">Recensioni fatte da me:</h2> <br>
                <div class="ui items">
                    <?php
                    if (isset($recensioniLoro[0]->titolo)) {
                        for($i = 0; $i < count($recensioniLoro); $i++) {
                            $u = getUserByID($recensioniLoro[$i]->idRecensito);
                            $usrNome = $u["nome"];
                            $usrCognome = $u["cognome"];
                            $usrName = strtolower($usrNome.'.'.$usrCognome);

                            echo '
                            <div class="item">
                                <div class="ui tiny image">
                                    <a class="header" href="../../offerte/recensione/esplora.php?id='.$recensioniLoro[$i]->id.'">
                                        <img src="../../assets/img/voti/'.$recensioniLoro[$i]->valore.'.png">
                                    </a>
                                </div>
                                <div class="content">
                                    <a class="header" href="./?usr='.$usrName.'">'.$usrNome.' '.$usrCognome.'</a>
                                    <div class="meta">
                                        <span>'.$recensioniLoro[$i]->titolo.'</span>
                                    </div>
                                    <div class="extra">
                                        '.$recensioniLoro[$i]->testo.'
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                    } else {
                        echo '
                            <p class="lead">
                                Quest'."'".'account non ha fatto ancora nessuna recensione
                            </p>
                        ';
                    }
                        
                    ?>
                </div>
                <?php
                    if ($response["livello"] == "Completo") {
                        include("./components/components-lavori.php");
                    }
                ?>
            </div>
        </div>

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../../assets/semantic/semantic.min.js"></script>
    </body>
</html>
