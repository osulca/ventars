<?php

namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class Usuario
{
    private $tipo;
    private $password;
    private $idPersona;

    public function __construct($idPersona, $password)
    {
        $this->idPersona = $idPersona;
        $this->password = $password;
    }

    public function crear()
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO usuarios(password, tipo, idPersona) VALUES('$this->password', '$this->tipo', '$this->idPersona')";
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

    public function getPassword(){
        {
            try {
                $conexion = new ConexionBD();
                $cnx = $conexion->getConexion();
                $sql = "SELECT password, tipo, idusuarios FROM usuarios WHERE idpersona='$this->idPersona';";
                $resultado = $cnx->query($sql);
                $conexion->cerrar();
                return $resultado;
            }catch (\PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}