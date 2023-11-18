<?php

namespace Controllers;

use Model\Emplado;
use MVC\Router;

class AuthController {
    public static function login(Router $router) {

        $empleado = new Emplado();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleado = new Emplado($_POST);

            $alertas = $empleado->validarLogin();

            if(empty($alertas)) {
                $empleadoDB = Emplado::where('userName', $empleado->userName);
                
                if($empleadoDB) {
                    if($empleado->comprobarPassword($empleadoDB->password)) {
                        session_start();

                        $_SESSION['id'] = $empleadoDB->id;
                        $_SESSION['usuario'] = $empleadoDB->userName;
                        $_SESSION['rango'] = $empleadoDB->rangoID;
                        $_SESSION['login'] = true;

                        header('location: /');

                    } else {
                        debuguear('no es correcto');
                    }
                } else {
                    $alertas = Emplado::getAlertas();
                }
            }
        }

        $router->render('auth/login', [

        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /login');
    }
}