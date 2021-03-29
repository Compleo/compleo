<?php

//CLASSI CHE RAPPRESENTANO IL FILE 'italia.json'

class Comuni 
{
    public $code; //String
    public $cap; //String
    public $nome; //String 
}

class Province
{
    public $code; //String
    public $comuni; //array( Comuni )
    public $nome; //String  
}

class Regioni 
{
    public $province; //array( Province )
    public $nome; //String  
}

class Application 
{
    public $regioni; //array( Regioni )
}

?>