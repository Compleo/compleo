<?php

//TODO: CREARE UN'ASTRAZIONE PER GESTIRE LE ATTIVITA'
include_once(__DIR__  . "/../compleo-api.php");

const activityRoot = root."activity";
const activityListRoot = activityRoot."/lid";
const activityListQualificaRoot = activityRoot."/listqual";
const activityListTuttiLavoriRoot = activityRoot."/listall";
const activityGetLavoroPerID = activityRoot."/getbyid";

//Ritorna la lista delle qualiche di cui dispongo
function listQualifiche() {
    $api_call = callAPI('GET', activityRoot, false);
    $response = json_decode($api_call, false);

    return $response;
}

function listTuttiILavori() {
  $api_call = callAPI('GET', activityListTuttiLavoriRoot, false);
  $response = json_decode($api_call, true);
  
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

function listLavoriPerQualifica ($qualifica) {
    $data_array = array(
        "qualifica"      => $qualifica,
      );

    $api_call = callAPI('GET', activityListQualificaRoot, $data_array);
    $response = json_decode($api_call, true);
      
    return $response;
}

function aggiungiLavoro($idUtente, $titolo, $testo, $professione) {
    $data_array = array(
        "usrID"      => $idUtente,
        "testo"      => $testo,
        "titolo"      => $titolo,
        "tipo"      => $professione
      );

      callApiPUT(activityRoot, $data_array);
}

function getLavoroPerID($id) {
  $data_array = array(
    "id"      => $id,
  );

  $api_call = callAPI('GET', activityGetLavoroPerID, $data_array);
  $response = json_decode($api_call, true);
    
  return $response;
}

function eliminaLavoroDaIdUser($id) {
  $data_array = array(
    "id"      => $id,
  );

  callAPI("DELETE", activityRoot, $data_array);
}

?>