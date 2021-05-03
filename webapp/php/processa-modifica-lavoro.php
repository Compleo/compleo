<?php
    session_start();

    include_once("./api/abstract/compleo-api-activity.php");

    //Controlla se sono loggato
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        $usr = $_SESSION['datiUtente'];
    } else {
        header('Location: ../');
    }

    //Controlla se ho l'id del lavoro
    if(isset($_GET['id'])) {
        $infoLavoro = getLavoroPerID($_GET['id']);

        //Controllo se posso modificare il lavoro come utente
        if($infoLavoro["idUtente"] == $usr["id"]) {
            //Controlla dati
            if(isset($_POST["testo"]) && $_POST["testo"] != " " &&
                isset($_POST["tipo"]) && $_POST["tipo"] != " " &&
                isset($_POST["titolo"]) && $_POST["titolo"] != " " &&
                isset($_POST["prezzo"]) && $_POST["prezzo"] != " " &&
                isset($_POST["unitaMisura"]) && $_POST["unitaMisura"] != " " &&                
                isset($_POST["arrayOrario"]) && $_POST["arrayOrario"] != " " &&
                isset($_POST["arrayGiorni"]) && $_POST["arrayGiorni"] != " "                 
                ) {
                    $testo = $infoLavoro["testo"];
                    $tipo = $infoLavoro["tipo"];
                    $titolo = $infoLavoro["titolo"];
                    
                    $prezzo = $infoLavoro["prezzo"];
                    $unitaMisura = $infoLavoro["unitaMisura"];
                    $disponibilita = $infoLavoro["disponibilita"];

                    //Controllo se è cambiato il testo
                    if($testo != $_POST["testo"]) {
                        $testo = $_POST["testo"];
                    }

                    //Controllo se è cambiato il Titolo
                    if($titolo != $_POST["titolo"]) {
                        $titolo = $_POST["titolo"];
                    }

                    //Controllo se è cambiato il tipo
                    if($tipo != $_POST["tipo"]) {
                        $tipo = $_POST["tipo"];
                    }

                    //controllo se è cambiata l'unità di misura
                    if($unitaMisura != $_POST["unitaMisura"]) {
                        $unitaMisura = $_POST["unitaMisura"];
                    }

                    //controllo se è cambiato il prezzo
                    if ($prezzo != $_POST["prezzo"]) {
                        $prezzo = $_POST["prezzo"];
                    }

                    //controllo se è cambiato l'disponibilita
                    if ($disponibilita != $_POST["disponibilita"]) {
                        $disponibilita = $_POST["disponibilita"];
                    }                    

                    aggiornaLavoro($_GET['id'], $titolo, $tipo, $testo, $unitaMisura, $prezzo, $disponibilita);
                
                    header('Location: ../offerte/modifica-lavoro.php?id='.$_GET['id']);
                } else {
                    header('Location: ../');
                }
        } else {
            header('Location: ../');
        }
    } else {
        header('Location: ../');
    }

?>