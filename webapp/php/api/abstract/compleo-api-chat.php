<?php
    include_once(__DIR__  . "/../compleo-api.php");

    const chatRoot = root."chat";
    const chatsGetUtenteDestinatarioAllRoot = chatRoot."/get/destinatario";
    const chatsGetUtenteRichiedenteAllRoot = chatRoot."/get/richiedente";

    //Chiamato dopo la creazione della prenotazione
    function NuovaChat($IDUtenteRichiedente, $IDUtenteDestinatario) {
        $data_array = array(
            "idUtenteRichiedente"      => $IDUtenteRichiedente,
            "idUtenteDestinatario"      => $IDUtenteDestinatario,
          );
        
          callApiPUT(chatRoot, $data_array);
    }

    function GetChatsUtenteDestinatario($idUtenteDestinatario) {
        $data_array = array(
            "id"      => $idUtenteDestinatario,
          );
        
        $api_call = callAPI('GET', chatsGetUtenteDestinatarioAllRoot, $data_array);
        $response = json_decode($api_call, true);
        
        return $response;
    }

    function GetChatsUtenteRichiedente($idUtenteRichiedente) {
        $data_array = array(
            "id"      => $idUtenteRichiedente,
          );
        
        $api_call = callAPI('GET', chatsGetUtenteRichiedenteAllRoot, $data_array);
        $response = json_decode($api_call, true);
        
        return $response;
    }

    function GetChat($idChat) {
        $data_array = array(
            "id"      => $idChat,
          );
        
        $api_call = callAPI('GET', chatRoot, $data_array);
        $response = json_decode($api_call, true);
        
        return $response;
    }
?>