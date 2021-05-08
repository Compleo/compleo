<?php
    session_start();

    include_once('./api/abstract/compleo-api-activity.php');

    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        $usr = $_SESSION['datiUtente'];

        if (isset($_POST['titolo']) && isset($_POST['tipo']) && isset($_POST['testo'])) {
            $titolo = $_POST['titolo'];
            $tipo = $_POST['tipo'];
            $testo = $_POST['testo'];

            $unitaMisura = $_POST['unitaMisura'];
            $prezzo = $_POST['prezzo'];

            $disponibilita = addslashes(json_encode($_POST['fascie']));

            if ($titolo != " " && $titolo != "" &&
                $tipo != " " && $tipo != "" &&
                $testo != " " && $testo != "") {
                    //I dati sono giusti
                    $id = $usr['id'];

                    aggiungiLavoro($id, $titolo, $testo, $tipo, $unitaMisura, $prezzo, $disponibilita);
                    
                    header('location: ../profilo');

                } else {
                    $_SESSION['erroreAggiungiLavoro'] = "Riempire tutti i campi";
                    header('location: ../profilo');
                }
        } else {
            $_SESSION['erroreAggiungiLavoro'] = "Riempire tutti i campi";
            header('location: ../profilo');
        }
    } else {
        header('location: ../');
    }
?>