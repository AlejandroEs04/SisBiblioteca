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
use Model\Negocio;
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
            
            if($_POST['id'] && empty($_POST['password'])) {
                $empleadoID = Emplado::where('id', $empleado->id);
                $empleado->password = $empleadoID->password;
            } else {
                $empleado->hashPassword();
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
                $autor = Autor::where('id', $_GET['id']);

                $res = $autor->eliminar();

                if($res) {
                    header('Location: /add-authors');
                }
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
                $libro = Libro::where('id', $_GET['id']);

                $res = $libro->eliminar();

                if($res) {
                    header('Location: /add-books');
                }
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
        $turnos = Turno::all();
        $rangos = Rango::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['turno']) {
                $turno = new Turno($_POST);

                $res = $turno->guardar();

                if($res) {
                    header('Location: /admin/schedule');
                }
            }

            if($_POST['rango']) {
                $rango = new Rango($_POST);

                $res = $rango->guardar();

                if($res) {
                    header('Location: /admin/schedule');
                }
            }
        }

        $router->render("admin/schedule", [
            'turnos' => $turnos,
            'rangos' => $rangos
        ]);
    }

    public static function configAdmin(Router $router) {
        $negocio = Negocio::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $negocio[0]->nombre = $_POST['nombre'];
            $negocio[0]->correo = $_POST['correo'];
            $negocio[0]->numero = $_POST['numero'];
            $negocio[0]->vision = $_POST['vision'];
            $negocio[0]->mision = $_POST['mision'];
            $negocio[0]->calleNumero = $_POST['calleNumero'];
            $negocio[0]->colonia = $_POST['colonia'];
            $negocio[0]->codigoPostal = $_POST['codigoPostal'];
            $negocio[0]->municipioID = 973;

            $res = $negocio[0]->guardar();

            if($res) {
                header('Location: /admin/config');
            }
        }

        $router->render("admin/config", [
            'negocio' => $negocio[0]
        ]);
    }
}