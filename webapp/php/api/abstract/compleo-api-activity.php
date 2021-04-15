<?php

//TODO: CREARE UN'ASTRAZIONE PER GESTIRE LE ATTIVITA'
include_once(__DIR__  . "/../compleo-api.php");

const activityRoot = root."activity";

//Ritorna la lista delle qualiche di cui dispongo
function listQualifiche() {
    $api_call = callAPI('GET', activityRoot, false);
    $response = json_decode($api_call, false);

    return $response;
}

function listQualifichePerIDLavoratore($id) {
    //RODO: IMPLEMENTA
}

function aggiungiLavoro($titolo, $testo, $professione) {
    //TODO: IMPLEMENTA
}

?>