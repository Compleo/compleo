<?php

session_start();

include("../../php/api/abstract/compleo-api-activity.php");
include("../../php/api/abstract/compleo-api-user.php");

if (isset($_GET["idRecensire"]) && isset($_GET["idRichiestaLavoro"])) {
    $idRecensire = $_GET["idRecensire"];
    $idRichiestaLavoro = $_GET["idRichiestaLavoro"];

    //Prendo info utente
    $utenteRecensito = getUserByID($idRecensire);
    $utenteRecensore = getUserByID($idRichiestaLavoro);

} else {
    //header("location: ../../");
    $utenteRecensito = getUserByID(1);
    $utenteRecensore = getUserByID(60);
}

?>

<html lang="it">

<head>
    <title>Compleo - Nuova Recensione</title>

    <meta name='viewport' content='width=device-width, initial-scale=1' />

    <!-- CSS !-->
    <link rel="stylesheet" type="text/css" href="../../assets/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="../../assets/style.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/bootstrap-modals.css">
    <link rel="stylesheet" type="text/css" href="./../../assets/bootstrap-grid.min.css">
    <link href="../../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- MENU !-->
    <?php include_once('navbar.php'); ?>

    <div class="ui stackable container" style="padding-top:5%;">
        <form class="ui form">

        <div class="two fields">           
                <div class="field">
                    <label>Recensito</label>            
                    <input type="text" name="recensito" value="<?php echo $utenteRecensito['username'];?>" id=recensito readonly >
                </div>
                
                
                <div class="field">
                    <label>Recensore</label>
                    <input type="text" name="recensore" value="<?php echo $utenteRecensore['username'];?>" id=recensore readonly >
                </div>
            </div>

            <div class="two fields">
                
            
                <div class="field">
                    <label>Titolo Recensione</label>            
                    <input type="text" name="titolo" placeholder="titolo" id=titolo>
                </div>
                
                
                <div class="field">
                    <label>Voto</label>
                    <select class="ui fluid search dropdown" name="voto" id="voto">
                        <option value="">voto</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>

                    </select>
                </div>
            </div>



            <div class="field">
                <label>Recensione</label>
                <textarea placeholder="testo recensione" name="testo" id="testo"></textarea>
            </div>

            <button class="ui blue button" type="submit">Conferma</button>

        </form>
    </div>


    <?php include_once('footer.php'); ?>

    <!-- JS !-->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../../assets/semantic/semantic.min.js"></script>
    <script>
        window.onload = function() {
            $('.ui.dropdown').dropdown();
        };
    </script>
</body>

</html>