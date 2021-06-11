<?php

use app\controladores\ControladorUsuario;

require_once "config/autoload.php";

?>
    <h1>Registrar Usuario</h1>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <input type="text" name="username" value="<?=(isset($_POST["username"]))?$_POST["username"]:""?>" placeholder="Ingrese Usuario">
        <input type="password" name="password" value="<?=(isset($_POST["password"]))?$_POST["password"]:""?>" placeholder="Ingrese Contraseña">
        <input type="submit" name="submit" value="Guardar">
    </form>
    <?=(isset($_GET["s"])?"Error":"")?>
<?php
if (!empty($_POST)) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $contador = 0;

    if($username==""){
        echo "el campo Usuario no puede estar vacio";
        unset($_POST["username"]);
        $contador++;
    }

    if($password==""){
        echo "el campo Contraseña no puede estar vacio";
        unset($_POST["password"]);
        $contador++;
    }

    if($contador==0) {
        $controladorUsuario = new ControladorUsuario();
        $controladorUsuario->guardar($username, $password);
    }
}

