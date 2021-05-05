<?php
include_once("../php/api/abstract/compleo-api-activity.php");
$qualifiche = listQualifiche();
$mieiLavori = listLavoriPerIDLavoratore($usr["id"]);
?>

<div class="ui clearing divider"></div>
<center>
    <h2 class="ui header">Lavori</h1>
</center>
<h4 class="ui dividing header">Proponiti per un lavoro</h1> <br>
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
            <label>Giorni e Ore</label>
            <button class="ui button aggiungiFascia" type="button"><i class="calendar plus icon"></i></button>
            <!-- DA IMPLEMENTARE L'AGGIUNTA DELLA FASCIA ORARIA !-->
        </div>
        <button class="ui blue button" type="submit">Proponiti</button>
        <?php
        if (isset($_SESSION['erroreAggiungiLavoro']) && $_SESSION['erroreAggiungiLavoro'] != "") {
            echo '
                <div class="ui negative message">
                    <i class="close icon"></i>
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
    <h4 class="ui dividing header">I miei lavori</h1> <br>
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

        <script type="text/javascript">
            window.onload = function() {
                $('.ui.dropdown').dropdown();
            };
        </script>