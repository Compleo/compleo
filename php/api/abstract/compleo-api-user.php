<?php

//ASTRAZIONE PER GESTIRE GLI UTENTI
include_once("./api/compleo-api.php");

const usrRoor = root."user";

function getUserByUsername($username) {
    $data_array = array(
        "usr"      => $username,
      );

    $api_call = callAPI('GET', usrRoor, $data_array);
    $response = json_decode($api_call, true);

    return $response;
}

function getUserByUsernameAndPassword($username, $password) {
    $data_array = array(
        "username"      => $username,
        "password"      => $password,
      );

      $api_call = callAPI('POST', usrRoor, json_encode($data_array));
      $response = json_decode($api_call, true);

      return $response;
}

?>