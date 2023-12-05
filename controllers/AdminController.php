<?php 

namespace Controllers;

use Model\Autor;
use Model\Clasificacion;
use Model\Editorial;
use Model\Emplado;
use Model\EmpleadoView;
use Model\Estado;
use Model\Genero;
use Model\InfoLibro;
use Model\LimLibros;
use Model\Libro;
use Model\Rango;
use Model\Turno;
use MVC\Router;
use OCILob;

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
        $empleado = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleado = new Emplado($_POST);

            if($_POST['id']) {
                $empleadoID = Emplado::where('id', $empleado->id);

                $empleado->password = $empleadoID->password;
            }

            $alertas = $empleado->validar();

            if(empty($alertas)) {
                $res = $empleado->guardar();

                if($res) {
                    header('Location: /admin/empleados');
                }
            }
        }

        if($_GET['id']) {
            if($_GET['eliminar']) {
                $empleado = Emplado::where('id', $_GET['id']);

                $empleado->activo = 0;
                $res = $empleado->guardar();

                if($res) {
                    header('Location: /admin/empleados');
                }
            } else {
                $empleado = Emplado::where('id', $_GET['id']);
            }

            if($_GET['activar']) {
                $empleado = Emplado::where('id', $_GET['id']);

                $empleado->activo = 1;
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
            'empleados' => $empleados,
            'empleado' => $empleado
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

        if($_GET['id']) {
            if($_GET['eliminar']) {
                
            } else {
                $autor = Autor::where('id', $_GET['id']);
            }
        }

        $router->render("admin/addAutores", [
            'autores' => $autores,
            'autor' => $autor
        ]);
    }

    public static function addBooks(Router $router) {
        $editoriales = Editorial::all();
        $generos = Genero::all();   
        $clasificaciones = Clasificacion::all();
        $limites = LimLibros::all();
        $libros = InfoLibro::all();

        $libro = null;

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

        if($_GET['id']) {
            if($_GET['eliminar']) {
                
            } else {
                $libro = Libro::where('id', $_GET['id']);
            }
        }

        $router->render("admin/addBooks", [
            'editoriales' => $editoriales,
            'generos'=> $generos,
            'clasificaciones'=> $clasificaciones,
            'limites'=> $limites,
            'libros' => $libros,
            'libro' => $libro
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

        if($_GET['id']) {
            $genero = Genero::where('id', $_GET['id']);
        } 

        $router->render("admin/addCategories", [
            'generos' => $generos,
            'genero' => $genero
        ]);
    }

    public static function scheduleAdmin(Router $router) {
        $router->render("admin/schedule", [

        ]);
    }
}