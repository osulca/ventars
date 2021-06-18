<?php

use config\Ayuda;
use app\controladores\ControladorProducto;
use app\controladores\ControladorDetalleVenta;

require_once "config/autoload.php";

Ayuda::autenticado();

require_once "public/layout/header.php";

$controladorProducto = new ControladorProducto();
$idVenta = $_REQUEST["id"];
?>
    <h2>Detalle Venta</h2>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <select class="form-control" name="producto">
            <?php
            $resultado = $controladorProducto->mostrarTodo();
            foreach ($resultado as $producto) {
                echo "<option value='" . $producto["idProducto"] . "'>" . $producto["nombre"] . "</option>";
            }
            ?>
        </select>
        <input class="form-control mt-2" type="number" name="cantidad">
        <input type="hidden" name="id" value="<?= $idVenta ?>">
        <div class="mt-2">
            <input class="btn btn-outline-success" type="submit" name="guardar" value="Guardar">
            <input class="btn btn-success" type="submit" name="finalizar" value="Finalizar">
        </div>
    </form>
<?php
if (isset($_POST["guardar"])) {
    $idProducto = $_POST["producto"];
    $cantidad = $_POST["cantidad"];
    $controladorDetalleVenta = new ControladorDetalleVenta();
    $controladorDetalleVenta->guardar($idProducto, $idVenta, $cantidad);
    $resultado = $controladorDetalleVenta->mostrar($idVenta);

    echo "<table class='table'><tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Parcial</th>
              </tr>";
    $total = 0;
    foreach ($resultado as $dv) {
        $parcial = (float)$dv["cantidad"] * (float)$dv["precio"];
        echo "<tr>
                <td>" . $dv["nombre"] . "</td>
                <td>S/. " . $dv["precio"] . "</td>
                <td>" . $dv["cantidad"] . "</td>
                <td>S/. $parcial</td>
              </tr>";
        $total += $parcial;
    }
    echo "<tr>
            <th colspan='3'>Total</th>
            <td><h5>S/. $total</h5></td>
          </tr>";
    echo "</table>";
}
require_once "public/layout/footer.php";

if (isset($_POST["finalizar"])) {
    header("location: bienvenido.php");
}
