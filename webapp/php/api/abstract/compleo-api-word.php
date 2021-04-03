<?php

//ASTRAZIONE PER GESTIRE LE CITTA' E LE PROVINCE
include_once("./api/compleo-api.php");

//TODO: PRIMA DI PROCEDERE CON L'IMPLEMENTAZIONE BISOGNA PENSARE CON SENNI COME SI VUOLE GESTIRE IL MONDO (JSON CON TUTTI I COMUNI ITALIANI PRESO DA INTERNET O COME HA FATTO IL PROF????)

function getCityFromID($cityID) {
    //TODO: IMPLEMENTA
}
  
function getProvinceFromCityName($cityName) {
    //TODO: IMPLEMENTA
}
  
function getProvinceFromCityID($cityID) {
    $cityName = getCityFromID($cityID);
  
    //TODO: IMPLEMENTA
}

?>