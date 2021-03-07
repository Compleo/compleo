<?php

class DB {
    public $db;
    function __constructor($server, $database, $utente, $passwd) {
        return $this->db = mysqli_connect($server, $database, $utente, $passwd);      
    }    
} 


?>