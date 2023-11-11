<?php

namespace Controllers;

use MVC\Router;

class PaginasController {
    public static function index(Router $router) {

        $router->render('paginas/index', [

        ]);
    }

    public static function agregarLibros(Router $router) {
        $router->render('paginas/addbook', [
            
        ]);
    }
}