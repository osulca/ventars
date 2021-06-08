<?php

use app\controladores\ControladorUsuario;

require_once "config/autoload.php";
?>
    <a href="usuarioCrear.php">Registrate</a>
    <form action="post" method="<?= $_SERVER["PHP_SELF"] ?>">
        <input type="text" name="username" placeholder="Ingrese Usuario">
        <input type="text" name="password" placeholder="Ingrese Contraseña">
        <input type="submit" name="submit" value="Ingresar">
    </form>
<?php
if (!empty($_POST)) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $controladorUsuario = new ControladorUsuario();
    $controladorUsuario->login($username, $password);
}
