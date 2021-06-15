<?php

use config\Ayuda;
use app\controladores\ControladorVenta;

include_once "config/autoload.php";

Ayuda::autenticado();

require_once "public/layout/header.php";

if(!isset($_POST["venta"])){
?>
    <h1>Registrar Ventas</h1>
    <form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
        <input class="btn btn-success" type="submit" name="submit" value="Registrar Venta">
        <input type="hidden" name="venta" value="venta">
    </form>
<?php
}
if(isset($_POST["venta"])){
    date_default_timezone_set("america/lima");
    $fecha = date("Y-m-d");
    $controladorVenta = new ControladorVenta();
    echo $controladorVenta->guardar($fecha);
}
require_once "public/layout/footer.php";