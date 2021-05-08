<?php
    /*
        ***************************************
                Compleo Source Code             
        ***************************************
        Programmer: Leonardo Baldazzi   (git -> @squirlyfoxy)
                                        (instagram -> @leonardobaldazzi_)

        Il seguente codice astrae i metodi delle API

        THE FOLLOWING SOURCE CODE IS CLOSED SOURCE, COPYRIGHT (C) 2021 - COMPLEO
    */

    include_once(__DIR__  . "/../compleo-api.php");

    const prenotazioneRoot = root."prenotazione";
    const prenotazioneGetRoot = prenotazioneRoot."/get";
    const prenotazioneGetAll = prenotazioneGetRoot."/all";
    const prenotazioneUpdateRoot = prenotazioneRoot."/update";

    const statusRichiesto = "Richiesta";
    const statusAccettato = "Accettata";
    const statusInProgresso = "In Progresso";
    const statusDaPagare = "Da Pagare";
    const statusChiusa = "Chiusa";

    function nuovaPrenotazione($idRichiedente, $idLavoro, $scelta) {
        $data_array = array(
            "idRichiedente"      => $idRichiedente,
            "idLavoro"      => $idLavoro,
            "scelta"      => $scelta,
          );

          callApiPUT(prenotazioneRoot, $data_array);
    }

    function eliminaPrenotazione($id) {
        $data_array = array(
            "id"      => $id,
          );

          callAPI("DELETE", prenotazioneRoot, $data_array);
    }

    function getPrenotazioniPerUtente($idUtente) {
        $data_array = array(
            "idUtente"      => $idUtente,
          );
        
          $api_call = callAPI('GET', prenotazioneRoot, $data_array);
          $response = json_decode($api_call, true);
          
          return $response;
    }

    function getPrenotazioneDaID($id) {
        $data_array = array(
            "id"      => $id,
          );

          $api_call = callAPI('GET', prenotazioneGetRoot, $data_array);
          $response = json_decode($api_call, true);
          
          return $response;
    }
    
    function getPrenotazioniDaIDLavoro($idLav) {
        $data_array = array(
            "idLav"      => $idLav,
          );

          $api_call = callAPI('GET', prenotazioneGetAll, $data_array);
          $response = json_decode($api_call, true);
          
          return $response;
    }

    function aggiornaStatoPrenotazione($id, $stato) {
        $data_array = array(
            "id"      => $id,
            "stato"      => $stato,
          );

          callApiPUT(prenotazioneUpdateRoot, $data_array);
    }
?>