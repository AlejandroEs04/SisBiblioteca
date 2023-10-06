<?php

namespace Controllers;

use MVC\Router;

class AuthController {
    public static function login(Router $router) {

        $router->render('auth/login', [

        ]);
    }
}