<?php
    session_start();

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
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/style.css?version=-1">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-grid.min.css">
        <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
               <!-- MENU !-->
               <?php include_once('navbar.php'); ?>
        
        <div class="ui stackable container" method="POST" action="../../php/add-recensione.php">
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
                            <a class="item active" href="./profilo-opzioni-fatturazione.php">
                                Fatturazione
                            </a>
                            <a class="item" href="./profilo-opzioni-chat.php">
                                Chat
                            </a>
                        </div>
                    </div>
                    <div class="twelve wide stretched column">
                        <div class="ui segment">
                            <h1>😴😴😴😴😴😴😴😴😴</h1>     
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once('footer.php'); ?>

        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../assets/semantic/semantic.min.js"></script>
        <script>
            $('.ui .item').on('click', function() {
                $('.ui .item').removeClass('active');
                $(this).addClass('active');
            }); 
        </script>
    </body>
</html>