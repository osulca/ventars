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
            header("location: index.php?s");
        } else {
            header("location: usuarioCrear.php?s");
        }

    }

    public function login($username, $password){
            $usuario = new Usuario($username, $password);
/*            $resultado = $usuario->existe();

            foreach ($resultado as $user){
                $passwordbd = $user["password"];
            }

            if (isset($passwordbd)){
                if(password_verify($password, $passwordbd)){*/
                    session_start();
                    $_SESSION["usuario"] = $username;
                    // TODO: extraer de la bd;
                    $_SESSION["tipo"] = "dispensador";
                    header("location: bienvenido.php");
              /*  }else{
                    echo "usuario y/o contraseña incorrecto";
                }
            }else{
                echo "usuario y/o contraseña incorrecto";
            }*/
    }
}