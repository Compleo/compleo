<?php
include_once("../php/api/abstract/compleo-api-activity.php");
$qualifiche = listQualifiche();
$mieiLavori = listLavoriPerIDLavoratore($usr["id"]);
?>

<div class="ui clearing divider"></div>
<center>
    <h2 class="ui header">Lavori</h1>
</center>
<h4 class="ui dividing header">Proponiti per un lavoro</h4> <br>
    <form class="ui form" method="POST" action="../php/aggiungiLavoro-verifica.php">
        <div class="field">
            <label>Titolo e Tipo del Lavoro</label>
            <div class="two fields">
                <div class="field">
                    <input type="text" name="titolo" placeholder="Titolo">
                </div>
                <div class="field">
                    <div class="ui selection dropdown select-tipo">
                        <input type="hidden" name="tipo">
                        <i class="dropdown icon"></i>
                        <div class="default text">Tipo</div>
                        <div class="menu">
                            <?php
                            foreach ($qualifiche as $descr) {
                                echo '<div class="item" data-value="' . $descr . '">' . $descr . '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="field">
                <label>Testo</label>
                <textarea id="testo" name="testo" rows="4" cols="50"></textarea>
                <p class="lead">
                    (Il testo deve rappresentare in modo fedele il tuo lavoro)
                </p>
            </div>
            <label>Prezzo e Unita di Misura</label>
            <div class="field">
                <input type="number" name="prezzo" placeholder="Prezzo">
            </div>
            <div class="field">
                <div class="ui selection dropdown select-unita-misura">
                    <input type="hidden" name="unitaMisura">
                    <i class="dropdown icon"></i>
                    <div class="default text">Unita di Misura</div>
                    <div class="menu">
                        <div class="item" data-value="€/hr">Per Ora</div>
                        <div class="item" data-value="€/m2">Per Metro Quadro</div>
                        <div class="item" data-value="€">Totale</div>
                    </div>
                </div>
            </div>
            <br>
            <h4 class="ui dividing header">Giorni e Ore</h4>
            <p class="lead">
                Le fasce orarie indicano i giorni e gli orari di lavoro in cui ti rendi disponibile
                </p>
                <div class="fascie" name="fascie">
                    <!-- Da copiare e incollare !-->
                    <div class="fascia0">
                        <br>
                        <h4 class="ui dividing header">Fascia Oraria</h4> <br>
                        <div class="field">
                            <label>Ora di Inizio e di Fine</label>
                            <div class="field">
                                <div class="ui calendar calendario-inizio">
                                    <div class="ui input left icon">
                                        <i class="time icon"></i>
                                        <input id="oInizio0" type="text" placeholder="Ora di Inizio" name="fascie[0]['oraInizio']">
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui calendar calendario-fine">
                                    <div class="ui input left icon">
                                        <i class="time icon"></i>
                                        <input id="oFine0" type="text" placeholder="Ora di Fine" name="fascie[0]['oraFine']">
                                    </div>
                                </div>
                            </div>
                            <label>Giorno della Settimana</label>
                            <div class="field">
                                <div class="ui selection dropdown select-giorno">
                                    <input id="gSettimana0" type="hidden" name="fascie[0]['giorno']">
                                    <i class="dropdown icon"></i>
                                    <div class="default text">Giorno della Settimana</div>
                                    <div class="menu">
                                        <div class="item" data-value="Lunedì">Lunedì</div>
                                        <div class="item" data-value="Martedì">Martedì</div>
                                        <div class="item" data-value="Mercoledì">Mercoledì</div>
                                        <div class="item" data-value="Giovedì">Giovedì</div>
                                        <div class="item" data-value="Venerdì">Venerdì</div>
                                        <div class="item" data-value="Sabato">Sabato</div>
                                        <div class="item" data-value="Domenica">Domenica</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="ui dividing header"></div> <br>
                <button class="ui button aggiungi-fascia" type="button"><i class="plus icon"></i></button>

            <!-- DA IMPLEMENTARE L'AGGIUNTA DELLA FASCIA ORARIA !-->
        </div>
        <button class="ui blue button" type="submit">Proponiti</button>
        <?php
        if (isset($_SESSION['erroreAggiungiLavoro']) && $_SESSION['erroreAggiungiLavoro'] != "") {
            echo '
                <div class="ui negative message" id="messaggio">
                    <i class="close icon" id="close"></i>
                    <div class="header">
                        Errore
                    </div>
                    <p>' . $_SESSION['erroreAggiungiLavoro'] . '
                    </p>
                </div>
            ';
            $_SESSION['erroreAggiungiLavoro'] = '';
        }
        ?>
    </form>
    <h4 class="ui dividing header">I miei lavori</h4> <br>
        <div class="ui items">
            <?php
            if (isset($mieiLavori)) {
                for ($i = 0; $i < count($mieiLavori); $i++) {

                    echo '
                <div class="item">
                    <div class="content">
                        <b>' . $mieiLavori[$i]["tipo"] . '</b>
                        <div class="meta">
                            <span>' . $mieiLavori[$i]["titolo"] . '</span>
                        </div>
                        <div class="extra">
                            ' . $mieiLavori[$i]["testo"] . '

                            <div class="ui two buttons" >
                                <a href = "../offerte/modifica-lavoro.php?id=' . $mieiLavori[$i]["id"] . '" >
                                    <button method="get" class = "ui blue button">Modifica Lavoro</button>
                                </a>
                                <a href = "../php/elimina-lavoro.php?id=' . $mieiLavori[$i]["id"] . '" >
                                    <button method="get" class = "ui red button">Elimina Lavoro</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                ';
                }
            } else {
                echo '<p class="lead">
                    Non mi sono ancora proposto per un lavoro
                </p>';
            }
            ?>
        </div>