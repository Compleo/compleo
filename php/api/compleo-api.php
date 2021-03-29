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
       case "PUT":
         curl_setopt($curl, CURLOPT_PUT, 1);
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
    echo curl_error($curl);
    curl_close($curl);
    die();
    return $result;
}

?>