<?php
    session_start();

    if(isset($_GET['idChat'])) {
        $idChat = $_GET['idChat'];
    }

    include_once("../php/api/abstract/compleo-api-chat.php");
?>

<html lang="it">
    <head>
        <title>Compleo - Chat</title>

        <!-- MetaTags (Google e simili) -->
        <meta name="title" content="Compleo - Chat">
        <meta name="description" content="Chat di Compelo">  
        <meta name='viewport' content='width=device-width, initial-scale=1' />

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/style.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-modals.css">
        <link rel="stylesheet" type="text/css" href="./../assets/bootstrap-grid.min.css">
        <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
        <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../../assets/css/style.css" rel="stylesheet">
    </head>
    <body>
        <!-- MENU !-->
            <?php include_once('navbar.php'); ?>
        <div class="ui stackable container">
            <div class="ui message">
                <div class="six wide right floated column">
                    <h2>DA IMPLEMENTARE</h2>
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
        <script src="./js/client.js"></script>
        <script>
            exampleSocket.onopen = function (event) {
                console.log("Connessione stabilita con il server realtime");

                RegMe(<?php echo $usr["id"]; ?>);
            }
        </script>
    </body>
</html>