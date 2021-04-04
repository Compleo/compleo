<?php
    session_start();

    include_once("../../php/api/abstract/compleo-api-user.php");

    if(isset($_GET["usr"]) && $_GET["usr"] != "") {
        $userToSearch = $_GET["usr"];

        if(isset($_SESSION["datiUtente"]) && $_SESSION["datiUtente"] == $userToSearch) {
            header("lcoation ../");
        }

        $response = getUserByUsername($userToSearch);

        if(isset($response["message"]) && $response["message"] == "error") {
            echo '
                <script>
                    console.log("Username non trovato");
                </script>
            ';
            header("location ../../");
        }
    } else {
        header("location ../../");
    }
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
                                        '.$usr["nome"].' '.$usr["cognome"].'
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <a class="active item" href="../">Profilo</a>
                                            <a class="item" href="../../chat">Chat</a>
                                            <a class="item" href="../../php/logout.php">Esci</a>
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
                    <a class="active item" href="./?usr=<?php echo $userToSearch; ?>">Lavori</a>
                    <a class="item" href="./profilo-informazioni.php?usr=<?php echo $userToSearch; ?>">Informazioni</a>
                </div>
                <h1>DA IMPLEMENTARE</h1>
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
