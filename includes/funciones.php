<?php
require 'app.php';

function addTemplate(string $nombre){
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado(){
    session_start();
    $auth = $_SESSION['login'];

    if($auth){
        return true;
    }else{
        return false;
    }
}