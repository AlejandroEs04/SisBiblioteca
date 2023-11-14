<?php 

namespace Controllers;

use Model\Autor;
use Model\Genero;
use MVC\Router;

class AdminController {
    public static function addAutores(Router $router) {

        $autor = new Autor();
        $autores = Autor::all();

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            $autor = new Autor($_POST);

            $alertas = $autor->validar();

            if(empty($alertas)) {
                $resultado = $autor->guardar();

                if($resultado) {
                    header("location: /add-authors");
                }
            }
        }

        $router->render("admin/addAutores", [
            'autores' => $autores,
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
                    header("location: /add-categories");
                }
            }
        }

        $router->render("admin/addCategories", [
            'generos' => $generos,
        ]);
    }
}