<?php

namespace Controllers;

use Model\Cliente;
use Model\Emplado;
use Model\EstadosMunicipios;
use Model\InfoLibro;
use Model\Libro;
use Model\Multa;
use Model\MultaView;
use Model\Prestamo;
use Model\PrestamoView;
use MVC\Router;

class PaginasController {
    public static function index(Router $router) {
        $clientes = Cliente::all();
        $empleados = Emplado::all();
        $librosTabla = [];
        $libros = InfoLibro::all();
        $i = 0;
        

        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if($_POST['libros']) {
                for($i; $i <= count($_POST['libros']) - 1; $i++ ) {
                    foreach($libros as $libro) {
                        if($libro->id === $_POST['libros'][$i]) {
                            $librosTabla[$i] = $libro;
                        }
                    }
                }
            }
            if($_POST['libro']) {
                foreach($libros as $libro) {
                    if($libro->id === $_POST['libro']) {
                        debuguear($libro);
                        $librosAct = array_diff($libros, array($libro->id));
                        debuguear($librosAct);
                        $librosTabla[$i] = $libro;

                    }
                }
            }
            if($_POST['clienteID'] && $_POST['empleadoID']) {
                $max = 0;

                for($i; $i <= count($_POST['libros']) - 1; $i++ ) {
                    foreach($libros as $libro) {
                        if($libro->id === $_POST['libros'][$i]) {
                            $librosTabla[$i] = $libro;
                        }

                        if($libro->diaslimite > $max) {
                            $max = $libro->diaslimite;
                        }
                    }
                }

                foreach($librosTabla as $libro) {
                    if($libro->diaslimite > $max) {
                        $max = $libro->diaslimite;
                    }
                }

                $prestamo = [
                    'clienteID' => $_POST['clienteID'],
                    'empleadoID' => $_POST['empleadoID'],
                    'fechaInicio' => date('Y-m-d'),
                    'fechaFin' => date('Y-m-d', strtotime(date('d-m-Y') . ' + ' . $max . ' days'))
                ];

                $prestamoObj = new Prestamo($prestamo);
                $res = $prestamoObj->guardar();

                foreach($librosTabla as $libro) {
                    $response = Prestamo::crearDetPrestamo($res['id'], $libro->id);

                    if($response) {
                        header('Location: /');
                    }
                }
            }
        }


        $router->render('paginas/index', [
            'librosTabla' => $librosTabla,
            'libros' => $libros,
            'empleados' => $empleados,
            'clientes' => $clientes
        ]);
    }

    public static function prestamos(Router $router) {
        $prestamos = PrestamoView::all();

        if($_GET['finalizar']) {
            $prestamo = Prestamo::where('id', $_GET['prestamo']);

            $prestamo->activo = 0;

            $res = $prestamo->guardar();

            if($res) {
                header('Location: /prestamos');
            }
        }

        if($_GET['eliminar']) {
            $prestamo = Prestamo::where('id', $_GET['prestamo']);

            $res = $prestamo->eliminar();

            if($res) {
                header('Location: /prestamos');
            }
        }

        $router->render('paginas/prestamos', [
            'prestamos' => $prestamos
        ]);
    }

    public static function multas(Router $router) {
        $prestamos = Prestamo::whereAll('activo', 1);
        $multas = MultaView::all();

        foreach($prestamos as $prestamo) {
            if(strtotime($prestamo->fechaFin) < strtotime(date("Y-m-d"))) {
                $prestamo->activo = 0;
                $prestamo->multa = 1;

                $multa = [
                    'prestamoID' => $prestamo->id,
                    'clienteID' => $prestamo->clienteID
                ];

                $multa = new Multa($multa);

                $res = $multa->guardar();
                

                if($res) {
                    $res2 = $prestamo->guardar();

                    if($res2) {
                        $multas = MultaView::all();
                    }
                }
            }
        }

        $router->render('paginas/multas', [
            'multas' => $multas
        ]);
    }

    public static function estados($id) {
        $municipios = EstadosMunicipios::whereAll('estadoID', $_GET['id']);

        // Configura el encabezado de la respuesta a JSON
        header('Content-Type: application/json');

        // Usa json_encode para convertir los datos a JSON
        echo json_encode($municipios);
    }
}