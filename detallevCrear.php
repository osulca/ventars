<?php
use  app\controladores\ControladorProducto;

require_once "config/autoload.php";

$controladorProducto = new ControladorProducto();
?>
<h2>Detalle Venta</h2>
<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <select name="producto">
        <?php
        $resultado = $controladorProducto->mostrarTodo();
        foreach ($resultado as $producto) {
            echo "<option value='".$producto["idProducto"]."'>".$producto["nombre"]."</option>";
        }
        ?>
    </select>
    <input type="number" name="cantidad">
    <input type="submit" name="guardar" value="Guardar">
    <input type="submit" name="finalizar" value="Finalizar">
</form>
<?php
if(isset($_POST["guardar"])) {
    echo $idVenta;
}
