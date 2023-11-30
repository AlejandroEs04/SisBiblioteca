<?php 

namespace Controllers;

use Model\Autor;
use Model\Clasificacion;
use Model\Editorial;
use Model\Emplado;
use Model\EmpleadoView;
use Model\Estado;
use Model\Genero;
use Model\LimLibros;
use Model\Libro;
use Model\Rango;
use Model\Turno;
use MVC\Router;

class AdminController {
    public static function index(Router $router) {
        $router->render('admin/index', [

        ]);
    }

    public static function empleadosAdmin(Router $router) {
        $estados = Estado::all();
        $turnos = Turno::all();
        $rangos = Rango::all();

        $empleados = EmpleadoView::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleado = new Emplado($_POST);

            $alertas = $empleado->validar();

            if(empty($alertas)) {
                $res = $empleado->guardar();

                if($res) {
                    header('Location: /admin/empleados');
                }
            }
        }

        $router->render('admin/empleadosAdmin', [
            'turnos' => $turnos,
            'rangos' => $rangos,
            'estados' => $estados,
            'empleados' => $empleados
        ]);
    }

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
        $editoriales = Editorial::all();
        $generos = Genero::all();   
        $clasificaciones = Clasificacion::all();
        $limites = LimLibros::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $libro = new Libro($_POST);

            $alertas = $libro->validar();

            if(empty($alertas)) {
                $resultado = $libro->guardar();

                if($resultado) {
                    header('Location: /add-books');
                }
            }
        }

        $router->render("admin/addBooks", [
            'editoriales' => $editoriales,
            'generos'=> $generos,
            'clasificaciones'=> $clasificaciones,
            'limites'=> $limites
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