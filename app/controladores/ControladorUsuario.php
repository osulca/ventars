<?php

namespace app\controladores;

use app\modelos\Usuario;

require_once "config/autoload.php";

class ControladorUsuario
{
    public function guardar($username, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $usuario = new Usuario($username, $password);
        if ($usuario->crear() != 0) {
            $resultado = "Guardado";
        } else {
            $resultado = "Error";
        }
        return $resultado;
    }

    public function login($username, $password){
        // comprobar usuario
            // si existe
                // compruebo contraseña
                    // si existe
                        // redirigir
                    // sino
                // error
            // sino
                // error
    }
}