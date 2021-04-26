<?php

/*
   ***************************************
           Compleo Source Code
   ***************************************
   Programmer: Leonardo Baldazzi   (git -> @squirlyfoxy)
                                   (instagram -> @leonardobaldazzi_)

   Il seguente codice contiene i metodi per gestire le recensioni

   THE FOLLOWING SOURCE CODE IS CLOSED SOURCE
*/

    include_once(__DIR__  . "/../compleo-api.php");

    const recensioneRoor = root."recensione";
    const recensioneRecRoot = recensioneRoor."/rec";
    const recensioneRedRoot = recensioneRoor."/red";
    const recensioneGetRoot = recensioneRoor."/get";

    function eliminaRecensione($id) {
        //TODO: IMPLEMENTA
    }

    function listAllRecensioniByIDRecensito($id) {
        $data_array = array(
            "rec"      => $id,
          );

        $api_call = callAPI('GET', recensioneRecRoot, $data_array);
        $response = json_decode($api_call, false);
    
        return $response;
    }

    function listAllRecensioniByIDRecensore($id) {
        $data_array = array(
            "red"      => $id,
          );

        $api_call = callAPI('GET', recensioneRedRoot, $data_array);
        $response = json_decode($api_call, false);
    
        return $response;
    }

    function addRecensione($recID, $redID, $voto, $titolo, $testo) {
        //TODO: IMPLEMENTA
    }

    function getRecensioneByID($id) {
        $data_array = array(
            "id"      => $id,
          );

          $api_call = callAPI('GET', recensioneGetRoot, $data_array);
          $response = json_decode($api_call, false);
      
          return $response;
    }

?>
