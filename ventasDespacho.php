<?php
use config\Ayuda;

require_once "config/autoload.php";

Ayuda::autenticado();

require_once "public/layout/header.php";
?>
    <h1>Despacho ventas</h1>
    <form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
        <input type="date" name="fecha">
        <input type="submit" name="submit" value="Buscar">
    </form>
<?php
if(!empty($_POST)){
    echo $_POST["fecha"];
}

require_once "public/layout/footer.php";
