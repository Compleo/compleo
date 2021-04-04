<?php
    session_start();

    $json = json_decode(file_get_contents("../php/json/italia.json"));

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("location: ./");
    }
?>

<html lang="it">
    <head>
        <title>Compleo - Registrazione</title>

        <!-- CSS !-->
        <link rel="stylesheet" type="text/css" href="../assets/semantic/semantic.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/loginStyle.css">
    </head>
    <body>
        <!-- MENU !-->
            <div class="ui large top fixed stackable menu">
                <div class="ui container">
                    <a class="item" href="../../"><img src="../assets/logo.png"></a>
                    <a class="item" href="../">
                        Home
                    </a>
                    <a class="item" href="../offerte/">
                        Offerte
                    </a>
                </div>
            </div>

            <div class="ui middle aligned grid child">
                <div class="column">
                    <div class="ui center aligned page grid">
                        <form class="ui form" method="POST" action="../php/login_verifica.php">
                            <h4 class="ui dividing header">Registrazione di livello base</h4>
                            <div class="field">
                                <label>Nome e Cognome</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" name="nome" placeholder="Nome">
                                    </div>
                                    <div class="field">
                                        <input type="text" name="cognome" placeholder="Cognome">
                                    </div>
                                </div>
                                <div class="field">
                                    <input type="text" name="cf" placeholder="Codice Fiscale">
                                </div>
                            </div>
                            <div class="field">
                                <label>Informazioni di contatto</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="text" name="telefono" placeholder="Telefono">
                                    </div>
                                    <div class="field">
                                        <input type="text" name="email" placeholder="E-Mail">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label>Provenienza</label>
                                <div class="three fields">
                                    <div class="field">
                                    <div class="ui selection dropdown select-regione">
                                        <input type="hidden" name="regione">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Regione</div>
                                            <div class="menu">
                                                <?php
                                                    for($i = 0; $i < count($json->regioni); $i++) {
                                                        echo '<div class="item" data-value="'.$json->regioni[$i]->nome.'">'.$json->regioni[$i]->nome.'</div>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                    <div class="ui selection dropdown select-provincia">
                                        <input type="hidden" name="provincia">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Provincia</div>
                                            <div class="menu">
                                                <?php
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field">
                                    <div class="ui selection dropdown select-comune">
                                        <input type="hidden" name="comune">
                                        <i class="dropdown icon"></i>
                                        <div class="default text">Comune</div>
                                            <div class="menu">
                                                <?php
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="field">
                                    <label>Indirizzo</label>
                                    <input type="text" name="indirizzo" placeholder="Indirizzo">
                                </div>
                            </div>
                            <h4 class="ui dividing header">Informazioni di accesso</h4>
                            <div class="field">
                                <label>Passord</label>
                                <div class="two fields">
                                    <div class="field">
                                        <input type="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="field">
                                        <input type="password" name="password2" placeholder="Ripeti Password">
                                    </div>
                                </div>
                            </div>
                            <button class="ui button" type="submit">Registrati</button> Sei già registrato? Clicca <a href="./login.php">qui</a>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>


        <!-- JS !-->
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../assets/semantic/semantic.min.js"></script>
        <script>

            var regioneSelezionata = false;
            var provinciaSelezionata = false;

            window.onload = function(){
                $('.ui.dropdown').dropdown();
            };

            $(document).ready(function(){
                $('.select-regione').change(function(){
                    //Selected value
                    var selectedRegione = $(this).dropdown('get value');

                    regioneSelezionata = true;

                    //TODO: POPOLARE IL DROPDOWN DELLE PROVINCIE
                });
            });

            $(document).ready(function(){
                $('.select-provincia').change(function(){
                    //Selected value
                    var selectedProvincia = $(this).dropdown('get value');

                    if(regioneSelezionata)
                    {
                        provinciaSelezionata = true;

                        //TODO: POPOLARE IL DROPDOWN DEI COMUNI
                    }
                });
            });
        </script>
    </body>
</html>