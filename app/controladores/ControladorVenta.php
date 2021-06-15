<?php

namespace app\controladores;

use app\modelos\Venta;

require_once "config/autoload.php";

class ControladorVenta
{
    public function guardar($fecha)
    {
        $id = $_SESSION["id"];
        $venta = new Venta($fecha, $id);
        $idVenta = $venta->crear();
        if ($idVenta != 0) {
            require_once "detallevCrear.php";
        } else {
            return "No se guardó";
        }

    }
}