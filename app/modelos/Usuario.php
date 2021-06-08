<?php

namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class Usuario
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function crear()
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO usuarios(username, password) VALUES('$this->username', '$this->password')";
            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function mostrar()
    {

    }

    public function existe(){
        {
            try {
                $conexion = new ConexionBD();
                $cnx = $conexion->getConexion();
                $sql = "SELECT COUNT(username)  FROM usuarios WHERE username='$this->username';";
                $resultado = $cnx->query($sql);
                $conexion->cerrar();
                return $resultado;
            }catch (\PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}