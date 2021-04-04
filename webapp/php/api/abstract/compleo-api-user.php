<?php

//ASTRAZIONE PER GESTIRE GLI UTENTI
include_once(__DIR__  . "/../compleo-api.php");

const usrRoor = root."user";

function getUserByUsername($username) {
    $data_array = array(
        "sr"      => $username,
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

function registraUtente($nome, $cognome, $cf, $indirizzo, $citta, $regione, $provincia, $telefono, $email, $livello, $piva, $password) {
  $data_array = array(
    "nome"      => $nome,
    "cognome"      => $cognome,
    "cf"      => $cf,
    "indirizzo"      => $indirizzo,
    "citta"      => $citta,
    "regione"      => $regione,
    "provincia"      => $provincia,
    "telefono"      => $telefono,
    "livello"      => $livello,
    "piva"      => $piva,
    "email"      => $email,
    "password"      => $password,
  );

  callApiPUT(usrRoor, $data_array);
}

function rimuoviUtente($id) {
  $data_array = array(
    "id"      => $id,
  );

  callAPI("DELETE", usrRoor, $data_array);
}

?>