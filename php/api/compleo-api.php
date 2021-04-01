<?php

const root = "127.0.0.1:5051/";

//Code from https://weichie.com/blog/curl-api-calls-with-php/
function callAPI($method, $url, $data){
    $curl = curl_init();

    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
       'APIKEY: 111111111111111111111',
       'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(curl_errno($curl))
    {
       die(curl_error($curl));
    }
    curl_close($curl);

    return $result;
}

//Code from: https://stackoverflow.com/questions/5043525/php-curl-http-put
function callApiPUT($url, $data)
{
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
   curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

   $response = curl_exec($ch);
   if(!$response) {
       return false;
   }
}

?>