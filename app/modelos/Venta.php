<?php

namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class Venta
{
    private $fecha;
    private $idUsuario;

    public function __construct($fecha, $idUsuario)
    {
        $this->fecha = $fecha;
        $this->idUsuario = $idUsuario;
    }

    public function crear()
    {
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO ventas(fecha, idUsuario) VALUES('$this->fecha', '$this->idUsuario')";
            $stmt =  $cnx->prepare($sql);
            $stmt->execute();
            $resultado = $cnx->lastInsertId();
            $conexion->cerrar();
            return $resultado;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}