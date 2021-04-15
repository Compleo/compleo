<?php
    include_once("../php/api/abstract/compleo-api-activity.php");
    $qualifiche = listQualifiche();
?>

<div class="ui clearing divider"></div>
<center>
    <h2 class="ui header">Lavori</h1>
</center>
<h4 class="ui dividing header">Proponiti per un lavoro</h1> <br>
<form class="ui form" method="POST" action="">
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
    </div>
    <button class="ui button" type="submit">Proponiti</button>
</form>
<h4 class="ui dividing header">I miei lavori</h1> <br>

<script type="text/javascript">
    window.onload = function(){
        $('.ui.dropdown').dropdown();
    };
</script>