<?php

namespace Controllers;

use Model\Cliente;
use Model\Emplado;
use Model\InfoLibro;
use Model\Libro;
use Model\Prestamo;
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

    public static function agregarLibros(Router $router) {
        $router->render('paginas/addbook', [
            
        ]);
    }
}