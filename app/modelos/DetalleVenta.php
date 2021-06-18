<?php
namespace app\modelos;

use config\ConexionBD;

require_once "config/autoload.php";

class DetalleVenta
{
    private $idProducto;
    private $idVenta;
    private $cantidad;

    public function __construct($idProducto, $idVenta, $cantidad)
    {
        $this->idProducto = $idProducto;
        $this->idVenta = $idVenta;
        $this->cantidad = $cantidad;
    }

    public function guardar(){
        try {
            $conexion = new ConexionBD();
            $cnx = $conexion->getConexion();
            $sql = "INSERT INTO detalleventas(idproducto, cantidad, idVenta) VALUES($this->idProducto, $this->cantidad, $this->idVenta)";
            $resultado = $cnx->exec($sql);
            $conexion->cerrar();
            return $resultado;
        }catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function mostrar($idVenta){
        {
            try {
                $conexion = new ConexionBD();
                $cnx = $conexion->getConexion();
                $sql = "SELECT p.nombre, p.precio, dv.cantidad 
                        FROM detalleventas as dv
                        JOIN productos as p
                        ON dv.idproducto = p.idProducto
                        WHERE dv.idventa = $idVenta";
                $resultado = $cnx->query($sql);
                $conexion->cerrar();
                return $resultado;
            }catch (\PDOException $e){
                echo $e->getMessage();
            }
        }
    }
}