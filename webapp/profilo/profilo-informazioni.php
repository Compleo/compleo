<?php
    session_start();
?>

<html lang="it">
    <head>
        <title>Compleo - Profilo</title>

        <!-- MetaTags (Google e simili) -->
        <meta name="title" content="Compleo - Profilo">
        <meta name="description" content="Il tuo profilo su Compleo">  

        <meta name='viewport' content='width=device-width, initial-scale=1' />
        <script src='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.2.0/mapbox-gl.css' rel='stylesheet' />
        <style>
            body {
                margin: 0;
                padding: 0;
            }

            #map {
                position:relative;
                height: 100%;
                width: 100%;
            }
        </style>

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
                                header("location: ./login.php");
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
                    <a class="active item" href="./profilo-informazioni.php">Informazioni</a>
                    <a class="item" href="./profilo-opzioni.php">Opzioni</a>
                </div>
                <table class="ui celled table">
                    <thead>
                        <tr><th>Nome</th>
                        <th>Cognome</th>
                        <th>Sesso</th>
                        <th>Data di Nascita</th>    
                        <th>Nome Utente</th>
                        <th>Codice Fiscale</th>
                        <th>Numero di Telefono</th>
                        <th>Indirizzo</th>
                    </tr></thead>
                    <tbody>
                        <tr>
                            <td data-label="Nome"><?php echo $usr["nome"]?></td>
                            <td data-label="Cognome"><?php echo $usr["cognome"]?></td>
                            <td data-label="Sesso"><?php echo $usr["sesso"]?></td>
                            <td data-label="Data di Nascita"><?php echo $usr["dataNascita"]?></td>
                            <td data-label="Nome Utente"><?php echo $usr["username"]?></td>
                            <td data-label="Codice Fiscale"><?php echo $usr["cf"]?></td>
                            <td data-label="Numero di Telefono"><?php echo $usr["telefono"]?></td>
                            <td data-label="Indirizzo"><?php echo $usr["citta"]["nome"].', '.$usr["indirizzo"].' ('.$usr["citta"]["regione"].', '.$usr["citta"]["provincia"].')'; ?></td>
                        </tr>
                    </tbody>
                </table> <br>
                (Le seguenti informazioni possono essere modifate, ove possibile, nella sezione Opzioni)
                <table class="ui celled table">
                    <thead>
                        <tr><th>Livello</th>
                        <?php 
                            if ($usr["livello"] == "Completo") {
                                echo "<th>Partita IVA</th>";
                            }
                        ?>
                    </tr></thead>
                    <tbody>
                        <tr>
                            <td data-label="Livello"><?php echo $usr["livello"]?></td>
                            <?php 
                                if ($usr["livello"] == "Completo") {
                                    echo '<td data-label="Partita IVA">'.$usr["piva"].'</td>
                                    ';
                                }
                            ?>
                        </tr>
                    </tbody>
                </table> <br>
                <?php 
                        if ($usr["livello"] != "Completo") {
                            echo '(Puoi passare in qualsiasi momento ad un account di livello Completo passando dalla sezioni Opzioni)
                        ';
                    }
                ?>
                <center>
                    <h1 class="ui header">Mappa</h1>
                </center> <br>
                <div class="ui clearing divider"></div>

                <div id="map">
                </div>
            </div>
        </div>

        <!-- JS !-->
        <script src="https://unpkg.com/es6-promise@4.2.4/dist/es6-promise.auto.min.js"></script>
        <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiY29tcGxlbyIsImEiOiJja25td3VwZ2IwaXhzMnZvNTZ5dmkwM2RqIn0.7UPvSEtBOp5vZtgeamb3RQ';
            var mapboxClient = mapboxSdk({ accessToken: mapboxgl.accessToken });
            mapboxClient.geocoding.forwardGeocode({
                query: '<?php echo $usr["citta"]["nome"].', '.$usr["indirizzo"].' ('.$usr["citta"]["regione"].', '.$usr["citta"]["provincia"].')';  ?>',
                autocomplete: false,
                limit: 1
            })
            .send()
            .then(function (response) {
                if (
                    response &&
                    response.body &&
                    response.body.features &&
                    response.body.features.length
                ) {
                    var feature = response.body.features[0];
                    
                    var map = new mapboxgl.Map({
                    container: 'map',
                    style: 'mapbox://styles/mapbox/streets-v11',
                    center: feature.center,
                    zoom: 10,

                    interactive: false
            });
            
            // Create a marker and add it to the map.
            new mapboxgl.Marker().setLngLat(feature.center).addTo(map);
            }
            });
        </script>
        <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
        <script src="../assets/semantic/semantic.min.js"></script>
    </body>
</html>