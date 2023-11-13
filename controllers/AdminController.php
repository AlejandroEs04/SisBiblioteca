<?php 

namespace Controllers;

use Model\Genero;
use MVC\Router;

class AdminController {
    public static function addAutores(Router $router) {
        $router->render("admin/addAutores", [

        ]);
    }

    public static function addBooks(Router $router) {
        $router->render("admin/addBooks", [

        ]);
    }

    public static function addCategories(Router $router) {

        $genero = new Genero();

        $generos = Genero::all();

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $genero = new Genero($_POST);

            $alertas = $genero->validar();

            if(empty($alertas)) {
                $resultado = $genero->guardar();

                if($resultado) {
                    header("location: /");
                }
            }
        }

        $router->render("admin/addCategories", [

        ]);
    }
}