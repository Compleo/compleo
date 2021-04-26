<?php 
function generateCookie($user,$password,$checkbox){
    if($checkbox == true)
    {
        setcookie("cuser",$user,time()+60*60*24*30);
        setcookie("cpass",$password,time()+60*60*24*30);
    }
}


?>