<?php
    include_once("../../php/api/abstract/compleo-api-activity.php");
    $mieiLavori = listLavoriPerIDLavoratore($response["id"]);
?>

<center>
    <h2 class="ui header">Lavori</h1>
</center> <br>
<h4 class="ui dividing header">Miei lavori:</h2> <br>
<div class="ui items">
    <?php
        for($i = 0; $i < count($mieiLavori); $i++) {

            $disabled = false;

            $nomeUtente = $response["nome"]." ".$response["cognome"];

            echo '
                <div class="item">
                    <div class="content">
                        <b>'.$mieiLavori[$i]["tipo"].'</b>
                        <div class="meta">
                            <span>'.$mieiLavori[$i]["titolo"].'</span>
                        </div>
                        <div class="extra content">
                            <span>'.$mieiLavori[$i]["testo"].'</span>
                            <div class="ui two buttons" >
                                <button class="ui button">Contatta</button>
                                <a class="header" onclick="showPopUp(\''.$mieiLavori[$i]["titolo"].'\', \''.$mieiLavori[$i]["tipo"].'\', \''.$mieiLavori[$i]["testo"].'\', \''.$nomeUtente.'\', \'./profilo/esplora/?usr='.$response["username"].'\', '. $disabled .')"><button class="ui button"  tabindex="1">Visualizza</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }
    ?>
</div>
