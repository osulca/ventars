<?php
namespace app\controladores;

use app\modelos\DetalleVenta;

require_once "config/autoload.php";

class ControladorDetalleVenta
{
    public function guardar($idProducto, $idVenta, $cantidad){
        $detalleVenta = new DetalleVenta($idProducto, $idVenta, $cantidad);
        return $detalleVenta->guardar();
    }

    public function mostrar($idVenta){
        return DetalleVenta::mostrar($idVenta);
    }
}