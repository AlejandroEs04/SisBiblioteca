<?php

namespace Controllers;

use Model\Cliente;
use Model\ClienteView;
use Model\Emplado;
use Model\EstadosMunicipios;
use Model\InfoLibro;
use Model\Estado;
use Model\Multa;
use Model\MultaView;
use Model\Prestamo;
use Model\PrestamoView;
use MVC\Router;
use Model\Negocio;
use Model\PrestamoLibro;


class PaginasController {
    public static function index(Router $router) {
        $negocio = Negocio::all();
        $clientes = Cliente::all();
        $empleados = Emplado::all();
        $librosTabla = [];
        $libros = InfoLibro::whereAll('activo', 1);
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
                    Prestamo::crearDetPrestamo($res['id'], $libro->id);
                }

                $librosTabla = [];

                $negocio = Negocio::all();
                $prestamoTicket = PrestamoView::where('id', $res['id']);

                $prestamoTicket->libros = PrestamoLibro::whereAll('prestamoID', $res['id']);

                $res = crearTicket($negocio, $prestamoTicket);
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
        $negocio = Negocio::all();

        if($_GET['id']) {
            $prestamo = PrestamoView::where('id', $_GET['id']);
            $libros = PrestamoLibro::whereAll('prestamoID', $_GET['id']);
        }

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

            $res0 = Prestamo::eliminarDetPrestamo($_GET['prestamo']);
            $res = $prestamo->eliminar();

            if($res) {
                header('Location: /prestamos');
            }
        }

        $router->render('paginas/prestamos', [
            'prestamos' => $prestamos,
            'prestamo' => $prestamo,
            'libros' => $libros
        ]);
    }

    public static function multas(Router $router) {
        $prestamos = Prestamo::whereAll('activo', 1);
        $negocio = Negocio::all();
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

    public static function clientes(Router $router) {
        $negocio = Negocio::all();
        $clientes = ClienteView::all();
        $estados = Estado::all();
        $clienteEditar = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente($_POST);

            $alertas = $cliente->validar();
            
            if(empty($alertas)) {
                $res = $cliente->guardar();

                if($res) {
                    header('Location: /clientes');
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
                $cliente = Cliente::where('id', $_GET['id']);
            }
        }

        $router->render('paginas/clientes', [
            'clientes' => $clientes,
            'estados' => $estados,
            'cliente' => $cliente,
        ]);
    }
}