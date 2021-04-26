<?php 
session_start();
include_once('./api/abstract/compleo-api-user.php');
include_once('generate_cookie_login.php');

    function ValidateCookie(){
        if(isset($_COOKIE['cuser']) && isset($_COOKIE['cpass']))
        {
            try
            {
                $response = getUserByUsernameAndPassword($_COOKIE['cuser'], $_COOKIE['cpass']);
                if(isset($response["message"]) && $response["message"] == "userNotFound")
                {
                $_SESSION['errore'] = "Account e/o password non corrispondono...";      
                header('Location: ..\index.php');
                } else {
                $_SESSION['datiUtente'] = $response;

                $_SESSION['login'] = true;

                $_SESSION['errore'] = "";
                header('Location: ..\index.php');
                }
            }catch(Exception $ex)
            {
                throw new Exception($ex->getMessage(), (int)$ex->getCode());
            }
        }
    }
?>