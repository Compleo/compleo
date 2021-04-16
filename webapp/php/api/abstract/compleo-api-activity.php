<?php

//TODO: CREARE UN'ASTRAZIONE PER GESTIRE LE ATTIVITA'
include_once(__DIR__  . "/../compleo-api.php");

const activityRoot = root."activity";
const activityListRoot = activityRoot."/lid";

//Ritorna la lista delle qualiche di cui dispongo
function listQualifiche() {
    $api_call = callAPI('GET', activityRoot, false);
    $response = json_decode($api_call, false);

    return $response;
}

function listLavoriPerIDLavoratore($id) {
    $data_array = array(
        "id"      => $id,
      );
    
    $api_call = callAPI('GET', activityListRoot, $data_array);
    $response = json_decode($api_call, true);
    
    return $response;
}

function aggiungiLavoro($idUtente, $titolo, $testo, $professione) {
    //TODO: IMPLEMENTA
}

?>