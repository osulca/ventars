<?php
namespace config;

class ConexionBD
{
    private $dsn = "mysql:host=localhost;dbname=ventars";
    private $user = "root";
    private $pass = "";
    private $conexion;

    // forma 1: conexion mediante constructor + getter
    public function __construct()
    {
        $this->conexion = new \PDO($this->dsn, $this->user, $this->pass);
    }

    public function getConexion(){
        return $this->conexion;
    }

    // forma 2: mediante funcion
    public function abrir()
    {
        $this->conexion = new \PDO($this->dsn, $this->user, $this->pass);
        return $this->conexion;
    }

    public function cerrar(){
        $this->conexion = null;
    }


}