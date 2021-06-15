<?php

namespace app\controladores;

use app\modelos\Persona;
use app\modelos\Usuario;

require_once "config/autoload.php";

class ControladorUsuario
{
    public function guardar($username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $usuario = new Usuario($username, $password);
        if ($usuario->crear() != 0) {
            header("location: index.php?s");
        } else {
            header("location: usuarioCrear.php?s");
        }

    }

    public function login($dni, $password)
    {
        $persona = new Persona();
        $resultado = $persona->existe($dni);

        foreach ($resultado as $person) {
            $idPersona = $person["idpersona"];
            $username = $person["nombres"];
        }

        if (isset($idPersona)) {
            $usuario = new Usuario($idPersona, $password);
            $resultado = $usuario->getPassword();

            foreach ($resultado as $user) {
                $passwordbd = $user["password"];
                $tipo = $user["tipo"];
                $id = $user["idusuarios"];
            }
            if (isset($passwordbd)) {
                // TODO: revisar validacion
                if (password_verify($password, $passwordbd)==false) {
                    session_start();
                    $_SESSION["usuario"] = $username;
                    $_SESSION["tipo"] = $tipo;
                    $_SESSION["id"] = $id;
                    header("location: bienvenido.php");
                } else {
                    echo "usuario y/o contraseña incorrecto";
                }
            } else {
                echo "usuario y/o contraseña incorrecto";
            }
        } else {
            echo "usuario y/o contraseña incorrecto";
        }

    }
}