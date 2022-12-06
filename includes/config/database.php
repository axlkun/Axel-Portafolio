<?php
function conectarDB() : mysqli{
    $db = mysqli_connect('localhost','root','admindb10','axel-portafolio');
    $db->set_charset('utf8');  

    if(!$db){
        echo "Error, no se pudo conectar!";
        exit; //se detiene la ejecucion del codigo
    }

    return $db;
}