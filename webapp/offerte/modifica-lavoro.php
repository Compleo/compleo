<?php
session_start();

/*
        ***************************************
                Compleo Source Code             
        ***************************************
        Programmer: Leonardo Baldazzi   (git -> @squirlyfoxy)
                                        (instagram -> @leonardobaldazzi_)

        Programmer: Mattia Senni        (git -> @mtttia)

        programmer: tommaso brandinelli (git -> @MayonaiseMan)

        Il seguente codice gestisce la reicerca delle offerte

        THE FOLLOWING SOURCE CODE IS CLOSED SOURCE, COPYRIGHT (C) 2021 - COMPLEO
    */


include_once("../php/api/abstract/compleo-api-activity.php");
include_once('../php/api/abstract/compleo-api-user.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $infoLavoro = getLavoroPerID($id);
    $qualifiche = listQualifiche();
} else {
    header("location: ../");
}
?>

<html lang="it">

<head>
    <title>Compleo - Modifica Lavoro</title>

    <!-- MetaTags (Google e simili) -->
    <meta name="title" content="Compleo - Offerte">
    <meta name="description" content="Modifica un'offerta">  
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
                <h2>
                    Modifica Lavoro
                </h2>
                <form class="ui form" method="POST" action="../php/processa-modifica-lavoro.php?id=<?php echo $_GET["id"]; ?>">
                    <div class="field">
                        <label>Titolo Lavoro</label>
                        <?php echo '<input type="text" name="titolo" value="' . $infoLavoro['titolo'] . '">'; ?>
                    </div>
                    <div class="field">
                        <div class="ui selection dropdown select-tipo">
                            <input type="hidden" name="tipo">
                            <i class="dropdown icon"></i>
                            <?php echo '<div class="default text" data-value="'.$infoLavoro["tipo"].'">'.$infoLavoro["tipo"].'</div>';?>                       
                            <div class="menu">                           
                            <?php
                                foreach($qualifiche as $lavoro)
                                {
                                    echo '<div class="item" data-value="'.$lavoro.'">'.$lavoro.'</div>';
                                }                              
                            ?>   
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Testo Lavoro</label>
                        <?php echo '<textarea id="testo" name="testo" rows="4" cols="50">' . $infoLavoro['testo'] . '</textarea>'; ?>
                    </div>
                    <button class="ui button" type="submit">Modifica</button>
                </form>

            </div>
        </div>

    </div>

    <?php include_once('footer.php'); ?>

    <!-- JS !-->
    <script type="text/javascript">window.onload = function() { $('.ui.dropdown').dropdown(); };</script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../assets/semantic/semantic.min.js"></script>
</body>

</html>