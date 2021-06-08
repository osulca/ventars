<?php

use app\controladores\ControladorUsuario;

require_once "config/autoload.php";
?>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <input type="text" name="username" placeholder="Ingrese Usuario">
        <input type="text" name="password" placeholder="Ingrese Contraseña">
        <input type="submit" name="submit" value="Guardar">
    </form>
<?php
if (!empty($_POST)) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $controladorUsuario = new ControladorUsuario();
    echo $controladorUsuario->guardar($username, $password);
}

