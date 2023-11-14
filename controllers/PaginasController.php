<?php

namespace Controllers;

use MVC\Router;

class PaginasController {
    public static function index(Router $router) {
        $librosTabla = [];


        $router->render('paginas/index', [
            'librosTabla' => $librosTabla,
        ]);
    }

    public static function agregarLibros(Router $router) {
        $router->render('paginas/addbook', [
            
        ]);
    }
}