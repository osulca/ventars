<?php

use app\controladores\ControladorUsuario;

require_once "config/autoload.php";
require_once "public/layout/header.php";
?>
    <div class="container">
        <a href="usuarioCrear.php">Registrate</a>
        <div class="text-center">
            <h1>Login</h1>
        </div>
        <div class="d-flex justify-content-center">
            <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
                <div class="mb-2">
                    <input class="form-control" type="text" name="username" placeholder="Ingrese Usuario">
                </div>
                <div class="mb-2">
                    <input class="form-control" type="password" name="password" placeholder="Ingrese Contraseña">
                </div>
                <div class="text-center d-grid gap-2">
                    <input class="btn btn-primary" type="submit" name="submit" value="Ingresar">
                </div>
            </form>
        </div>
    </div>
<?php
if (!empty($_POST)) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $controladorUsuario = new ControladorUsuario();
    $controladorUsuario->login($username, $password);
}
require_once "public/layout/footer.php";
