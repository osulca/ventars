<?php
namespace config;

class Ayuda
{
    public static function autenticado(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            header("location: index.php");
        }
    }
}