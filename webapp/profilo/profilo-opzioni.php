<?php
    session_start();
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
                                        '.$usr["nome"].' '.$usr["cognome"].'
                                        <i class="dropdown icon"></i>
                                        <div class="menu">
                                            <a class="active item" href="./">Profilo</a>
                                            <a class="item" href="../chat">Chat</a>
                                            <a class="item" href="../php/logout.php">Esci</a>
                                        </div>
                                    </div>   
                                ';
                            } else {
                                header("location: ../");
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
                    <a class="item" href="./">Lavori</a>
                    <a class="item" href="./profilo-informazioni.php">Informazioni</a>
                    <a class="active item" href="./profilo-opzioni.php">Opzioni</a>
                </div>

                <div class="ui grid">
                    <div class="four wide column">
                        <div class="ui vertical fluid tabular menu">
                            <a class="item active" href="./profilo-opzioni.php">
                                Account
                            </a>
                            <a class="item" href="./profilo-opzioni-fatturazione.php">
                                Fatturazione
                            </a>
                            <a class="item" href="./profilo-opzioni-chat.php">
                                Chat
                            </a>
                        </div>
                    </div>
                    <div class="twelve wide stretched column">
                        <div class="ui segment">
                            <form class="ui form" method="POST" action="">
                                <h4 class="ui dividing header">Informazioni anagrafiche</h4> <br>
                                <div class="field">
                                    <label>Nome e Cognome</label>
                                    <div class="two fields">
                                        <div class="field disabled">
                                            <input type="text" name="nome" placeholder="Nome" value="<?php echo $usr["nome"]; ?>">
                                        </div>
                                        <div class="field disabled">
                                            <input type="text" name="cognome" placeholder="Cognome" value="<?php echo $usr["cognome"]; ?>">
                                        </div>
                                    </div>
                                    <label>Codice Fiscale</label>
                                    <div class="field disabled">
                                        <input type="text" name="cf" placeholder="Codice Fiscale" value="<?php echo $usr["cf"]; ?>">
                                    </div>
                                </div>
                                <h4 class="ui dividing header">Informazioni di contatto</h4> <br>
                                <div class="field">
                                    <label>Telefono e E-Mail</label>
                                    <div class="two fields">
                                        <div class="field">
                                            <input type="text" name="telefono" placeholder="Telefono" value="<?php echo $usr["telefono"]; ?>">
                                        </div>
                                        <div class="field">
                                            <input type="text" name="email" placeholder="E-Mail" value="<?php echo $usr["email"]; ?>">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="ui dividing header">Informazioni di accesso</h4> <br>
                                <div class="field">
                                    <label>Passord</label>
                                    <div class="two fields">
                                        <div class="field">
                                            <input type="password" name="password" placeholder="Nuova Password">
                                        </div>
                                        <div class="field">
                                            <input type="password" name="password2" placeholder="Ripeti Password">
                                        </div>
                                    </div>
                                </div>
                                <h4 class="ui dividing header">Account</h4> <br>
                                <div class="field">
                                    <div class="field">
                                        <label>Bio</label>
                                        <textarea id="bio" name="bio" rows="4" cols="50"><?php echo $usr["bio"]; ?></textarea>
                                        <p class="lead">
                                            (La bio è come se fosse il tuo biglietto da visita per gli altri utenti)
                                        </p>
                                    </div>
                                    <div class="field">
                                        <?php 
                                            if ($usr["livello"] == "Completo") {
                                                echo '
                                                    <div class="field">
                                                        <label>Partita IVA</label>
                                                        <div class="field disabled">
                                                            <input type="text" name="iva" placeholder="Partita IVA" value="'.$usr["piva"].'">
                                                        </div>
                                                    </div>
                                                ';
                                            } else {
                                                echo '
                                                    <center>
                                                        <a href="">
                                                            <button class="ui button" type="submit">Passa all'."'".'account Completo</button>
                                                        </a>
                                                    </center>
                                                '; //TOOD: NECESSITA DELLA CREAZIONE DI UNA PAGINA APPOSITA DOVE VIENE CHIESTA LA PARTITA IVA
                                            }
                                        ?>
                                    </div>
                                </div>
                                <button class="ui button" type="submit">Aggiorna</button>
                                <br>
                                <p class="lead">
                                    (Se hai sbagliato ad inserire dati non modificabili in fase di registrazione contatta l'assistenza)
                                </p>
                                
                            </form> 
                            <hr>  
                            <div class="ui negative message">
                                <div class="header">
                                    Sezione Pericolosa
                                </div>
                                <p>
                                    LE SEGUENTI FUNZIONI SONO IRREVERSIBILI, PENSARE PRIMA DI ESEGUIRE <br> <br>
                                    <a href="../php/elimina-account.php"> <? //TODO: IMPLEMENTARE PAGINA E API PER ELIMINARE L'ACCOUNT; CHIEDERE CONFERMA PRIMA DI PROCEDERE ?>
                                        <button class="ui negative button">Elimina Account</button>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
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
            $('.ui .item').on('click', function() {
                $('.ui .item').removeClass('active');
                $(this).addClass('active');
            }); 
        </script>
    </body>
</html>