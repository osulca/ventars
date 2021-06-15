<?php

namespace app\controladores;

use app\modelos\Producto;

require_once "config/autoload.php";

class ControladorProducto
{
    public function mostrarTodo(){
        $producto = new Producto();
        $result = $producto->mostrar();
        return $result;
    }
}