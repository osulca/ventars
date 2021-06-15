<?php

namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class Producto
{
    public function mostrar(){
        {
            try {
                $conexion = new ConexionBD();
                $cnx = $conexion->getConexion();
                $sql = "SELECT * FROM productos";
                $resultado = $cnx->query($sql);
                $conexion->cerrar();
                return $resultado;
            }catch (\PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}