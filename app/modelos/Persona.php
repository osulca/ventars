<?php

namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class Persona
{
    private $dni;
    private $nombres;
    private $apellidos;

    public function existe($dni){
        {
            try {
                $conexion = new ConexionBD();
                $cnx = $conexion->getConexion();
                $sql = "SELECT idpersona, nombres FROM personas WHERE dni='$dni'";
                $resultado = $cnx->query($sql);
                $conexion->cerrar();
                return $resultado;
            }catch (\PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}